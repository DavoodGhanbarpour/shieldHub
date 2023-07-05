<?php

namespace App\Facades;

use App\Models\Invoice;
use Illuminate\Support\Facades\Facade;

/**
 * @method static deletePreviousDebitInvoices(int $userId)
 * @method static Invoice sendDebit( int $subscriptionId )
 * @method static Invoice upsert(array $information, int $id = null)
 * @method static delete(int $id)
 */
class InvoiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'InvoiceFacade';
    }
}
