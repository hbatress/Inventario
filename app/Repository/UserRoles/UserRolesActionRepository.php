<?php

namespace App\Repository\UserRoles;
use App\Contracts\UserRoles\UserRolesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\UserRole;
class UserRolesActionRepository  extends BaseRepository implements UserRolesActionInterface
{
    public function __construct()
    {
        parent::__construct(new UserRole());
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
