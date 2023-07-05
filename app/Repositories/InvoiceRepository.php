<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Subscription;
use Carbon\Carbon;

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

    public function sendDebit( int $subscriptionId ) : Invoice
    {
        $subscription = Subscription::query()
            ->where('id', $subscriptionId)
            ->firstOrFail();

        $debitPrice = $subscription->subscription_price * Carbon::parse($subscription->start_date)
                ->diffInDays($subscription->end_date);

        return $this->upsert([
            'debit' => round($debitPrice),
            'user_id' => $subscription->user_id,
            'subscription_id' => $subscription->id,
            'date' => now(),
        ]);
    }

    public function deletePreviousDebitInvoices( int $userId )
    {
        return Invoice::query()->where([
            ['debit', '>=', '0'],
            ['credit', '=', '0'],
            ['user_id', '=', $userId],
            ['subscription_id', '>', '0'],
        ])->delete();
    }
}
