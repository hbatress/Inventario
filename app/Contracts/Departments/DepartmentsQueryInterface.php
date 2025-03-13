<?php

namespace App\Contracts\Departments;

interface DepartmentsQueryInterface
{
    public function getAction($id);
    public function getActionBy($id, $column);
    public function getAll();
}
