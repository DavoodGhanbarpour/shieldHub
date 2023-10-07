<?php

namespace App\DTOs;

use App\Rules\CommaSeparatedPrice;
use WendellAdriel\ValidatedDTO\Casting\FloatCast;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class InboundDTO extends ValidatedDTO
{
    public int $inbound_id;
    public float $subscription_price;
    public string $start_date;
    public string $end_date;
    public null|string $description;

    protected function rules(): array
    {
        return [
            'inbound_id' => ['required', 'integer', 'exists:inbounds,id'],
            'subscription_price' => ['required', new CommaSeparatedPrice()],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'inbound_id' => new IntegerCast(),
            'subscription_price' => new FloatCast(),
        ];
    }
}
