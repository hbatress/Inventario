<?php

namespace App\Contracts\Actions;

interface ActionsActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
