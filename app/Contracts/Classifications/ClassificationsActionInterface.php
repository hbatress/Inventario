<?php

namespace App\Contracts\Classifications;

interface ClassificationsActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
