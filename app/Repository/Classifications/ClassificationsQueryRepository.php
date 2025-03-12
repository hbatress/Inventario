<?php

namespace App\Repository\Classifications;
use App\Contracts\Classifications\ClassificationsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Classification;
class ClassificationsQueryRepository  extends BaseRepository implements ClassificationsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Classification());
    }
    public function getAction($id){
        return $this->model->find($id);
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
