<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\InboundDTO;
use App\DTOs\RenewSubscriptionDTO;
use App\Facades\InvoiceFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignInboundsRequest;
use App\Http\Requests\Admin\RenewSubscriptionsRequest;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Inbound;
use App\Models\Server;
use App\Models\Subscription;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Throwable;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('admin.users.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.users.index', [
            'users' => User::withCount('activeSubscriptions')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.pages.users.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if (UserService::isEmailUnique($request->get('email'), [$user->email])) {
            return back()->withErrors([
                __('validation.exists', ['attribute' => $request->get('email')]),
            ]);
        }

        $inputs = $request->validated();
        if (!isset($inputs['password'])) {
            unset($inputs['password']);
        }

        $user->update($inputs);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return redirect()->route('admin.users.index');
    }

    private function usersInbounds(User $user): array
    {
        $result = [];
        foreach (Inbound::withCount('activeSubscriptions')->with('server')->get() as $key => $each) {
            $result[$key] = $each;
            $result[$key]->subscription_data = $each->activeSubscriptions()
                ->whereIn('inbound_id', $user->activeSubscriptions()->pluck('inbound_id'))
                ->first()
                ?->pivot ?: null;
        }
        return $result;
    }

    public function inbounds(User $user)
    {
        return view('admin.pages.users.inbounds', [
            'user' => $user,
            'inbounds' =>
                collect(
                    $this->usersInbounds($user)
                )->sortBy('subscription_data', SORT_REGULAR, true),
            'servers' => Server::all()
        ]);
    }

    public function inbounds2(User $user)
    {
        return view('admin.pages.users.inbounds2', [
            'user' => $user
        ]);
    }

    public function inboundsJson(User $user): JsonResponse
    {
        $result = [];
        $userInbounds = $user->inbounds()->pluck('inbound_id')->toArray();
        foreach (Inbound::withCount('activeSubscriptions')->with('server')->get() as $key => $each) {
            $result[$key]['inbound']['id'] = $each->id;
            $result[$key]['inbound']['title'] = $each->title;
            $result[$key]['inbound']['link'] = $each->link;
            $result[$key]['inbound']['port'] = $each->port;
            $result[$key]['inbound']['activeSubscriptions'] = $each->active_subscriptions_count;
            $result[$key]['inbound']['description'] = $each->description;
            $result[$key]['inbound']['isAttachedToUser'] = in_array($each->id, $userInbounds);
            $result[$key]['inbound']['defaultStartDate'] = $each->server->start_date;
            $result[$key]['inbound']['defaultEndDate'] = $each->server->end_date;
            $result[$key]['inbound']['defaultPrice'] = $each->server->subscription_price;
            $result[$key]['server']['id'] = $each->server->id;
            $result[$key]['server']['title'] = $each->server->title;
            $result[$key]['server']['ip'] = $each->server->ip;
        }
        return response()->json([
            'inbounds' => $result,
            'servers' => Server::all()
        ]);
    }

    public function invoices(User $user)
    {
        return view('admin.pages.users.invoices', [
            'invoices' => $user->invoices,
            'user' => $user
        ]);
    }

    public function invoicesJson(User $user): JsonResponse
    {
        return response()->json([
            'invoices' => $user->invoices,
            'user' => $user
        ]);
    }

    public function subscriptions(User $user)
    {
        return view('admin.pages.users.subscriptions', [
            'subscriptions' => $user->inbounds,
            'user' => $user
        ]);
    }

    public function subscriptionsJson(User $user): JsonResponse
    {
        $result = [];
        foreach ($user->inbounds()->with('server')->get() as $key => $each){
            $result[$key]['is_active'] = Carbon::parse($each->pivot->end_date)
                ->gte(now());
            $result[$key]['subscription_id'] = $each->pivot->id;
            $result[$key]['start_date'] = $each->pivot->start_date;
            $result[$key]['end_date'] = $each->pivot->end_date;
            $result[$key]['description'] = $each->pivot->description;
            $result[$key]['subscription_price'] = $each->pivot->subscription_price;
            $result[$key]['remaining_days'] = Carbon::parse($each->pivot->start_date)
                    ->diffInDays($each->pivot->end_date) ?? 0;
            $result[$key]['total_price'] = $result[$key]['subscription_price'] * $result[$key]['remaining_days'];

            $result[$key]['inbound']['title'] = $each->title;
            $result[$key]['inbound']['link'] = $each->link;
            $result[$key]['inbound']['port'] = $each->port;
            $result[$key]['inbound']['id'] = $each->id;
            $result[$key]['server']['title'] = $each->server->title;
            $result[$key]['server']['ip'] = $each->server->ip;
        }
        return response()->json([
            'subscriptions' => $result,
            'user' => $user
        ]);
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws ValidationException
     */
    public function attachInbounds(AssignInboundsRequest $request, User $user): JsonResponse
    {
        $data = collect($request->get('inbounds'))->map(function ($item, $key) {
            if ($item['subscription_price']) {
                $item['subscription_price'] = removeSeparator($item['subscription_price']);
            }
            return $item;
        });
        $user->createSubscription(new InboundDTO($data->first()));
        return response()->json();
    }

    /**
     * @throws Throwable
     */
    public function detachInbounds(Subscription $subscription, User $user): JsonResponse
    {
        $user->deleteSubscription($subscription->id);
        return response()->json();
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws ValidationException
     */
    public function renewSubscriptions(RenewSubscriptionsRequest $request): RedirectResponse
    {
        foreach ($request->validated('tableCheckbox') as $userId => $each) {
            User::find($userId)->renewSubscription(new RenewSubscriptionDTO([
                'day_count' => $request->input('daysCount'),
                'date' => $request->input('date'),
                'price' => $request->input('price'),
            ]));
        }
        return redirect()->route('admin.users.index');
    }
}
