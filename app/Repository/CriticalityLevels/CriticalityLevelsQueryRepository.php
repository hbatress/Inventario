<?php

namespace App\Repository\CriticalityLevels;
use App\Contracts\CriticalityLevels\CriticalityLevelsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\CriticalityLevel;
class CriticalityLevelsQueryRepository  extends BaseRepository implements CriticalityLevelsQueryInterface
{
    public function __construct()
    {
        parent::__construct(new CriticalityLevel());
    }

    public function getAction($id){
        return $this->model->where('CriticalityID', $id)->first();
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
