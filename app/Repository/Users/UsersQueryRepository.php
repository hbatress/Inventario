<?php

namespace App\Repository\Users;
use App\Contracts\Users\UsersQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Person;
class UsersQueryRepository  extends BaseRepository implements UsersQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Person());
    }
    public function getAction($id){
        return $this->model->where('UserID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
