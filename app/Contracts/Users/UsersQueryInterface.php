<?php

namespace App\Contracts\Users;

interface UsersQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
    public function getAll();
}
