<?php

namespace App\Repository\AssetTypes;
use App\Contracts\AssetTypes\AssetTypesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\AssetType;
use Illuminate\Support\Facades\Log;
class AssetTypesActionRepository extends BaseRepository implements AssetTypesActionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new AssetType());
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
