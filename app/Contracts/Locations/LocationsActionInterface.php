<?php

namespace App\Contracts\Locations;

interface LocationsActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
