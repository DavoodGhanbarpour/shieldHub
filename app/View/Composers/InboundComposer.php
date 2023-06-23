<?php

namespace App\View\Composers;

use App\Http\Resources\Admin\InboundResource;
use App\Models\Inbound;
use Illuminate\View\View;

class InboundComposer
{

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('inboundsComposed', InboundResource::collection(Inbound::all()));
    }
}
