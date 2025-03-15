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
    public function creacion( $data){

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
        try {
            $record = $this->find($id);
            if (!$record) {
                return [false, "Record not found", 404];
            }

            // Filtrar solo los campos que existen en el modelo
            $filteredData = array_intersect_key($data, $record->getAttributes());

            // Si no hay datos para actualizar, retorna sin cambios
            if (empty($filteredData)) {
                return [false, "No valid fields to update", 400];
            }

            $record->update($filteredData);

            return [true, "Accion Actualizada", 200, $record];

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
