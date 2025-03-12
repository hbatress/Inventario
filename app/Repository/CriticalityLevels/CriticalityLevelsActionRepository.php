<?php

namespace App\Repository\CriticalityLevels;
use App\Contracts\CriticalityLevels\CriticalityLevelsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\CriticalityLevel;
use Illuminate\Support\Facades\Log;
class CriticalityLevelsActionRepository  extends BaseRepository implements CriticalityLevelsActionInterface
{
    public function __construct()
    {
        parent::__construct(new CriticalityLevel());
    }
    public function create( $data){
        try{
            $this->model->create($data);
            return [true, "Accion Agregada", 200];
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return [false, "Internal Server Error ",500, null];
        }
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
