<?php

namespace App\Repository\CriticalityLevels;
use App\Contracts\CriticalityLevels\CriticalityLevelsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\CriticalityLevel;
class CriticalityLevelsActionRepository  extends BaseRepository implements CriticalityLevelsActionInterface
{
    public function __construct()
    {
        parent::__construct(new CriticalityLevel());
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
