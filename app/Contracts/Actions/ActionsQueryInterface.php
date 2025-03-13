<?php

namespace App\Contracts\Actions;

interface ActionsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
    public function getAll();
}
