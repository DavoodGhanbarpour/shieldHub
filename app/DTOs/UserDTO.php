<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class UserDTO extends ValidatedDTO
{
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
        return [];
    }
}
