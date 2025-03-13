<?php

namespace App\Contracts\Statuses;

interface StatusesQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
    public function getAll();
}
