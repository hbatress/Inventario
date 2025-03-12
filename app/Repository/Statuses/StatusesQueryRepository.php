<?php

namespace App\Repository\Statuses;
use App\Contracts\Statuses\StatusesQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Status;
class StatusesQueryRepository  extends BaseRepository implements StatusesQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Status());
    }
    public function getAction($id){
        return $this->model->where('StatusID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
