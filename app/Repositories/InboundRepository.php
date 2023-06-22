<?php

namespace App\Repositories;

use App\Models\Inbound;

class InboundRepository
{
    public function upsert(array $information, int $id = null): Inbound
    {
        if (isset($id)) {
            $inbound = Inbound::findOrFail($id);
            $inbound->update($information);

            return $inbound;
        }

        return Inbound::create($information);
    }

    public function delete(int $id)
    {
        return Inbound::where('id', '=', $id)->delete();
    }
}
