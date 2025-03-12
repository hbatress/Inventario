<?php

namespace App\Repository\Assets;
use App\Contracts\Assets\AssetsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Asset;
class AssetsQueryRepository extends BaseRepository implements AssetsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Asset());
    }
    public function getAction($id){
        return $this->model->find($id);
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
