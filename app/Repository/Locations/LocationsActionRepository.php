<?php

namespace App\Repository\Locations;
use App\Contracts\Locations\LocationsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Location;
class LocationsActionRepository  extends BaseRepository implements LocationsActionInterface
{
    public function __construct()
    {
        parent::__construct(new Location());
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
