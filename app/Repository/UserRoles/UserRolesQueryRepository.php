<?php

namespace App\Repository\UserRoles;
use App\Contracts\UserRoles\UserRolesQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
class UserRolesQueryRepository   extends BaseRepository implements UserRolesQueryInterface
{
    public function __construct()
    {
        parent::__construct(new UserRole());
    }
    public function getAction($id){
        return $this->model->find($id);
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
