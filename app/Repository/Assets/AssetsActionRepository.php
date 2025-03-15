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
            // Buscar el registro
            $record = $this->model->find($id);

            if (!$record) {
                return [false, "Record not found", 404];
            }

            // Validar que $data sea un array
            if (!is_array($data) || empty($data)) {
                return [false, "Invalid data", 400];
            }

            // Filtrar solo los campos que existen en el modelo Y que no sean null
            $filteredData = array_filter(
                array_intersect_key($data, $record->getAttributes()),
                function ($value) {
                    return $value !== null;
                }
            );

            // Si no hay datos para actualizar, retorna sin cambios
            if (empty($filteredData)) {
                return [false, "No valid fields to update", 400];
            }

            // Actualizar el registro con los datos filtrados
            $record->update($filteredData);

            return [true, "Accion Actualizada", 200, $record];

        } catch (\Exception $e) {
            Log::error("Error updating record: " . $e->getMessage());

            return [false, "Internal Server Error: " . $e->getMessage(), 500];
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
