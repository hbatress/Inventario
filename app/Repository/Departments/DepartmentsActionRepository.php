<?php

namespace App\Repository\Departments;
use App\Contracts\Departments\DepartmentsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Department;
use Illuminate\Support\Facades\Log;
class DepartmentsActionRepository  extends BaseRepository implements DepartmentsActionInterface
{
    public function __construct()
    {
        parent::__construct(new Department());
    }
    public function create( $data){
        try{
            $this->model->create($data);
            return [true, "Accion Agregada", 200];
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return [false, "Internal Server Error ",500, null];
        }
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
