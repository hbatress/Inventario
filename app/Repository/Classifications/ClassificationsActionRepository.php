<?php

namespace App\Repository\Classifications;
use App\Contracts\Classifications\ClassificationsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Classification;
use Illuminate\Support\Facades\Log;
class ClassificationsActionRepository  extends BaseRepository implements ClassificationsActionInterface
{
    public function __construct()
    {
        parent::__construct(new Classification());
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
