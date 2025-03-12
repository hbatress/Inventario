<?php

namespace App\Repository\Actions;
use App\Contracts\Actions\ActionsActionInterface;
use App\Models\Action;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
class ActionsActionRepository extends BaseRepository  implements ActionsActionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new Action());
    }

    public function create(array $data)
    {
        $validatedData = validator($data, [
            'ActionName' => 'required|string|max:255',
            // otros campos y sus reglas de validación
        ])->validate();
    
        $action = new Action();
        $action->ActionName = $validatedData['ActionName'];
        // asignar otros campos
        $action->save();
    
        return $action;
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
