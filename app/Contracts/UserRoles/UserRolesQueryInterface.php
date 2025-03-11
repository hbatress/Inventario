<?php

namespace App\Contracts\UserRoles;

interface UserRolesQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
