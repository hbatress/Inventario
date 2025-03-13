<?php

namespace App\Repository\Users;
use App\Contracts\Users\UsersQueryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Persons;
use Illuminate\Support\Facades\Log;
class UsersQueryRepository  extends BaseRepository implements UsersQueryInterface
{
    public function __construct()
    {
        parent::__construct(new Persons());
    }
    public function getAction($id){
        return $this->model->where('UserID', $id)->first();
    }
    public function getActionBy($id, $password){
        return $this->model->where('UserID', $id)->where('PasswordHash', $password)->first();
    }

    public function getAll()
    {
        $data = $this->model->all()->toArray();
        \Log::info('Data retrieved:', $data);
        return $data;
    }
}
