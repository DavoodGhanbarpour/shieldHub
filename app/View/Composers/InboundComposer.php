<?php

namespace App\View\Composers;

use App\Models\Inbound;
use Illuminate\View\View;

class InboundComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('inboundsComposed', Inbound::all());
    }
}
