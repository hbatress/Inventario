<?php

namespace App\Contracts\Classifications;

interface ClassificationsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
