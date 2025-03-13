<?php

namespace App\Repository\AssetTypes;
use App\Contracts\AssetTypes\AssetTypesQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\AssetType;
class AssetTypesQueryRepository extends BaseRepository  implements AssetTypesQueryInterface
{
    public function __construct()
    {
        parent::__construct(new AssetType());
    }
    public function getAction($id){
        return $this->model->where('TypeID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
    public function getAll(){
        return $this->model->all();
    }
}
