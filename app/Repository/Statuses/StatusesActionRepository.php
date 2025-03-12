<?php

namespace App\Repository\Statuses;
use App\Contracts\Statuses\StatusesActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Status;
class StatusesActionRepository  extends BaseRepository implements StatusesActionInterface
{
    public function __construct()
    {
        parent::__construct(new Status());
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
