<?php

namespace App\DTOs;

use App\Rules\CommaSeparatedPrice;
use WendellAdriel\ValidatedDTO\Casting\FloatCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class RenewSubscriptionDTO extends ValidatedDTO
{
    public ?string $date;
    public ?int $day_count;
    public ?float $price;

    protected function rules(): array
    {
        return [
            'price' => ['sometimes', new CommaSeparatedPrice()],
            'date' => ['required_without:day_count', 'date'],
            'day_count' => ['required_without:date', 'integer'],
        ];
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
