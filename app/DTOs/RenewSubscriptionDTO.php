<?php

namespace App\DTOs;

use App\Rules\CommaSeparatedPrice;
use WendellAdriel\ValidatedDTO\Casting\FloatCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class RenewSubscriptionDTO extends ValidatedDTO
{
    public ?string $start_date;
    public ?string $end_date;
    public ?int $day_count;
    public ?float $price;

    protected function rules(): array
    {
        return [];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'price' => new FloatCast(),
        ];
    }
}
