<?php

namespace App\Repository\Departments;
use App\Contracts\Departments\DepartmentsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Department;
class DepartmentsQueryRepository  extends BaseRepository implements DepartmentsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Department());
    }
    public function getAction($id){
        return $this->model->where('DepartmentID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
    public function getAll(){
        return $this->model->all();
    }
}
