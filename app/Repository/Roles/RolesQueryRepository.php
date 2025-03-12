<?php

namespace App\Repository\Roles;
use App\Contracts\Roles\RolesQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Role;
class RolesQueryRepository  extends BaseRepository implements RolesQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Role());
    }
    public function getAction($id){
        return $this->model->where('RoleID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
