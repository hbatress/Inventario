<?php

namespace App\Contracts\Assets;

interface AssetsQueryInterface
{
    public function getAction($id);
    public function getAll();

    public function getById($id,$toll);
}
