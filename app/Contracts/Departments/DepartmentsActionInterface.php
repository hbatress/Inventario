<?php

namespace App\Contracts\Departments;

interface DepartmentsActionInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
