<?php

namespace App\Contracts\AssetTypes;

interface AssetTypesQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
