<?php

namespace App\Repositories;

use App\Models\Server;

class ServerRepository
{
    public function upsert(array $information, int $id = null): Server
    {
        if (isset($id)) {
            $user = Server::findOrFail($id);
            $user->update($information);

            return $user;
        }

        return Server::create($information);
    }

    public function delete(int $id)
    {
        return Server::where('id', '=', $id)->delete();
    }
}
