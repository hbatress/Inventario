<?php

namespace App\Repository\AssetTypes;
use App\Contracts\AssetTypes\AssetTypesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\AssetType;
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