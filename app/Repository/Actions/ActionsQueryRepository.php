<?php

namespace App\Repository\Actions;
use App\Contracts\Actions\ActionsQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Action;
use App\Repository\BaseRepository;
class ActionsQueryRepository extends BaseRepository implements ActionsQueryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct(new Action());
    }
    public function getAction($id){
        $action = $this->model->find($id);
        if (!$action) {
            return ['status' => false, 'data' => null];
        }
        return ['status' => true, 'data' => $action];
    }
    public function getActionBy($id, $column){
        return $this->model->where($column, $id)->get();
    }
}
