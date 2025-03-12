<?php

namespace App\Repository\Assets;
use App\Contracts\Assets\AssetsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Asset;
use Illuminate\Support\Facades\Log;
class AssetsActionRepository extends BaseRepository implements AssetsActionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new Asset());
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
