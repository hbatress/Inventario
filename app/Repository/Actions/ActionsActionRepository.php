<?php

namespace App\Repository\Actions;
use App\Contracts\Actions\ActionsActionInterface;
use App\Models\Action;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\Log;
class ActionsActionRepository extends BaseRepository  implements ActionsActionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new Action());
    }

    public function create($data)
    {
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
