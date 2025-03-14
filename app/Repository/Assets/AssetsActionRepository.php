<?php

namespace App\Repository\Assets;
use App\Contracts\Assets\AssetsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\assets_tablecls;
use Illuminate\Support\Facades\Log;
class AssetsActionRepository extends BaseRepository implements AssetsActionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new assets_tablecls());
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
       public function update($id, $data)
    {
        dd($data);
        try {
            $record = $this->find($id);
            if ($record) {
                $record->update($data);
                return [true, "Accion Actualizada", 200];
            } else {
                return [false, "Record not found", 404];
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [false, "Internal Server Error", 500];
        }
    }
    public function delete($idActivo,){
        $Expenses = $this->find($idActivo);
        if (!$Expenses) {
            return [false, "Activo no encontrado", null];
        }
        $Expenses->delete();
        return [true, "Activo Eliminado", $Expenses];
    }
}
