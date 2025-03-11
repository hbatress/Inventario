<?php

namespace App\Contracts\CriticalityLevels;

interface CriticalityLevelsActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
