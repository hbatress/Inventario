<?php

namespace App\Repository\Assets;
use App\Contracts\Assets\AssetsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\assets_tablecls;
class AssetsQueryRepository extends BaseRepository implements AssetsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new assets_tablecls());
    }
    public function getAction($id){
        return $this->model->where('AssetID', $id)->first();
    }
    public function getAll(){
        return $this->model->paginate(10);
    }

    public function getById($id,$toll)
    {
        // Mapeo de números a nombres de columnas
        $columns = [
            1 => 'TypeID',
            2 => 'LocationID',
            3 => 'DepartmentID',
            4 => 'StatusID',
            5 => 'ClassificationID',
            6 => 'CriticalityID'
        ];

        // Verificar si la bandera numérica es válida
        if (!isset($columns[$toll])) {
            return response()->json(['error' => 'Parámetro inválido'], 400);
        }

        // Obtener el nombre de la columna según el número
        $column = $columns[$toll];

        // Filtrar los activos y paginar los resultados (10 por página)
        $assets = $this->model->where($column, $id)->paginate(10);

        return response()->json($assets);
    }
}
