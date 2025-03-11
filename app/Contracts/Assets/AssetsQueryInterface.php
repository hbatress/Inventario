<?php

namespace App\Contracts\Assets;

interface AssetsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
