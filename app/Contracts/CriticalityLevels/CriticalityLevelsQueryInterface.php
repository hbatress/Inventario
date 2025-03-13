<?php

namespace App\Contracts\CriticalityLevels;

interface CriticalityLevelsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
    public function getAll();
}
