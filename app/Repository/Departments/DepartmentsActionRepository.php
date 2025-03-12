<?php

namespace App\Repository\Departments;
use App\Contracts\Departments\DepartmentsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Department;
class DepartmentsActionRepository  extends BaseRepository implements DepartmentsActionInterface
{
    public function __construct()
    {
        parent::__construct(new Department());
    }
    public function create( $data){
        return $this->model->create($data);
    }
    public function update( $id, $data){
        $record = $this->find($id);
        return $record->update($data);
    }
    public function delete( $id){
        $record = $this->find($id);
        return $record->delete();
    }
}
