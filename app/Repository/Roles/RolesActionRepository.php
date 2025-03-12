<?php

namespace App\Repository\Roles;
use App\Contracts\Roles\RolesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
class RolesActionRepository  extends BaseRepository implements RolesActionInterface
{
    public function __construct()
    {
        parent::__construct(new Role());
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
