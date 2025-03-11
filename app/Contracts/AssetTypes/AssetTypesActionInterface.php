<?php

namespace App\Contracts\AssetTypes;

interface AssetTypesActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
