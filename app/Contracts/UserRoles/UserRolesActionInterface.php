<?php

namespace App\Contracts\UserRoles;

interface UserRolesActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
