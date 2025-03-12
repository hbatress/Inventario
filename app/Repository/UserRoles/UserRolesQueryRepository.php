<?php

namespace App\Repository\UserRoles;
use App\Contracts\UserRoles\UserRolesQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\UserRole;
class UserRolesQueryRepository   extends BaseRepository implements UserRolesQueryInterface
{
    public function __construct()
    {
        parent::__construct(new UserRole());
    }
    public function getAction($id){
        return $this->model->where('RoleID', $id)->get();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
