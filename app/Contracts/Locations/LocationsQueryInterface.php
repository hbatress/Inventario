<?php

namespace App\Contracts\Locations;

interface LocationsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
}
