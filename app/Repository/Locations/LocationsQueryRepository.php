<?php

namespace App\Repository\Locations;
use App\Contracts\Locations\LocationsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Location;
class LocationsQueryRepository  extends BaseRepository implements LocationsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Location());
    }
    public function getAction($id){
        return $this->model->where('LocationID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
    public function getAll(){
        return $this->model->all();
    }
}
