<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    public function upsert(array $information, int $id = null): Invoice
    {
        if (isset($id)) {
            $user = Invoice::findOrFail($id);
            $user->update($information);

            return $user;
        }

        return Invoice::create($information);
    }

    public function delete(int $id)
    {
        return Invoice::where('id', '=', $id)->delete();
    }
}
