<?php

namespace App\Repository\Users;
use App\Contracts\Users\UsersActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Person;
class UsersActionRepository  extends BaseRepository implements UsersActionInterface
{
    public function __construct()
    {
        parent::__construct(new Person());
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
