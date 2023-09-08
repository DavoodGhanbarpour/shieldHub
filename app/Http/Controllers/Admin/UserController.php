<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationEvent;
use App\Facades\InvoiceFacade;
use App\Facades\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignInboundsRequest;
use App\Http\Requests\Admin\RenewSubscriptionsRequest;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Inbound;
use App\Models\Server;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
        UserFacade::upsert($request->validated());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // event(new NotificationEvent('hello world'));

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
        if (UserFacade::isEmailUnique($request->get('email'), [$user->email])) {
            return back()->withErrors([
                __('validation.exists', ['attribute' => $request->get('email')]),
            ]);
        }

        $inputs = $request->validated();
        if (!isset($inputs['password'])) {
            unset($inputs['password']);
        }

        UserFacade::upsert($inputs, $user->id);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        UserFacade::delete($id);

        return redirect()->route('admin.users.index');
    }

    public function inbounds(User $user)
    {
        $result = [];
        foreach (Inbound::withCount('activeSubscriptions')->with('server')->get() as $key => $each) {
            $result[$key] = $each;
            $result[$key]->subscription_data = $each->activeSubscriptions()
                ->whereIn('inbound_id', $user->activeSubscriptions()->pluck('inbound_id'))
                ->first()
                ?->pivot ?: null;
        }

        return view('admin.pages.users.inbounds', [
            'user' => $user,
            'inbounds' =>
                collect($result)->sortBy('subscription_data', SORT_REGULAR, true),
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

    public function subscriptions(User $user)
    {
        return view('admin.pages.users.subscriptions', [
            'subscriptions' => $user->inbounds,
            'user' => $user
        ]);
    }

    public function assignInbounds(AssignInboundsRequest $request, User $user): RedirectResponse
    {
        $data = collect($request->get('inbounds'))->map(function ($item, $key) {
            if ($item['subscription_price']) {
                $item['subscription_price'] = removeSeparator($item['subscription_price']);
            }
            return $item;
        });

        $user->inbounds()->with('activeSubscriptions')->sync($data ?: []);

        $this->deleteUserPastInvoices($user);
        return redirect()->route('admin.users.index');
    }

    public function renewSubscriptions(RenewSubscriptionsRequest $request)
    {
        foreach ($request->validated('tableCheckbox') as $userId => $each) {
            $user = User::find($userId);
            if ($user->isDisabled()) {
                continue;
            }
            $user->inbounds()->orderBy('end_date', 'asc')->get()->groupBy('id')->map(function ($inbound) use ($user, $request) {
                $lastInbound = $inbound->last();
                if (is_null($lastInbound)) {
                    return;
                }

                $startDate = \Illuminate\Support\Carbon::parse($lastInbound->pivot->end_date)->addDay();
                if ($request->filled('date'))
                    $endDate = \Illuminate\Support\Carbon::parse($request->input('date'));
                else
                    $endDate = $startDate->clone()->addDays($request->input('daysCount'));

                if ($startDate->gte($endDate)) {
                    return;
                }
                $user->inbounds()->attach($lastInbound->id, [
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                    'subscription_price' => removeSeparator($request->input('price') ?? $lastInbound->pivot->subscription_price)
                ]);
                $this->deleteUserPastInvoices($user);
            });
        }
        return redirect()->route('admin.users.index');
    }
    /**
     * @param User $user
     * @return void
     * @internal
     */
    private function deleteUserPastInvoices(User $user): void
    {
        InvoiceFacade::deletePreviousDebitInvoices($user->id);

        $user->inbounds->map(function ($inbound) {
            if (Carbon::parse($inbound->pivot->end_date)->gte(now()))
                InvoiceFacade::sendDebit($inbound->pivot->id);
        });
    }
}
