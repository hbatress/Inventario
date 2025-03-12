<?php

namespace App\Repository\Roles;
use App\Contracts\Roles\RolesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Role;
class RolesActionRepository  extends BaseRepository implements RolesActionInterface
{
    public function __construct()
    {
        parent::__construct(new Role());
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
