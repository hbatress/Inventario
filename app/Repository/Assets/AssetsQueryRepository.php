<?php

namespace App\Repository\Assets;
use App\Contracts\Assets\AssetsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\assets_tablecls;
class AssetsQueryRepository extends BaseRepository implements AssetsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new assets_tablecls());
    }
    public function getAction($id){
        return $this->model->where('AssetID', $id)->first();
    }
    public function getAll(){
        return $this->model->paginate(10);
    }
}
