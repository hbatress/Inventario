<?php

namespace App\Contracts\Users;

interface UsersActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
