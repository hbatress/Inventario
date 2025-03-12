<?php

namespace App\Repository\Classifications;
use App\Contracts\Classifications\ClassificationsActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Classification;
class ClassificationsActionRepository  extends BaseRepository implements ClassificationsActionInterface
{
    public function __construct()
    {
        parent::__construct(new Classification());
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
