<?php

namespace App\Repository\UserRoles;
use App\Contracts\UserRoles\UserRolesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\UserRole;
use Illuminate\Support\Facades\Log;
class UserRolesActionRepository  extends BaseRepository implements UserRolesActionInterface
{
    public function __construct()
    {
        parent::__construct(new UserRole());
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
