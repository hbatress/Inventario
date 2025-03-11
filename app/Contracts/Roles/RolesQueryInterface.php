<?php

namespace App\Contracts\Roles;

interface RolesQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
