<?php

namespace App\Contracts\Roles;

interface RolesActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
