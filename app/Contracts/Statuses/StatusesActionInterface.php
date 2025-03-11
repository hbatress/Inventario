<?php

namespace App\Contracts\Statuses;

interface StatusesActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
