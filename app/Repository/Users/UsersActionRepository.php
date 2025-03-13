<?php

namespace App\Repository\Users;
use App\Contracts\Users\UsersActionInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repository\BaseRepository;
use App\Models\Persons;
use Illuminate\Support\Facades\Log;
class UsersActionRepository  extends BaseRepository implements UsersActionInterface
{
    public function __construct()
    {
        parent::__construct(new Persons());
    }
    public function create($data){
        try {
            // Check if email already exists
            if ($this->model->where('Email', $data['Email'])->exists()) {
                return [false, "Correo Electronico ya existente", 400, null];
            }
            if (isset($data['PasswordHash'])) {
                $data['PasswordHash'] = bcrypt($data['PasswordHash']);
            }
            $this->model->create($data);
            return [true, "Accion Agregada", 200];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [false, "Internal Server Error", 500, null];
        }
    }
    public function update( $id, $data){
        $record = $this->find($id);
        return $record->update($data);
    }
    public function delete( $id){
        $record = $this->find($id);
        return $record->delete();
    }

    public function loginAction($credentials) {
        $user = $this->model->where('Email', $credentials['Email'])->first();
        if ($user && \Hash::check($credentials['PasswordHash'], $user->PasswordHash)) {
            return [true, "Login Successful", 200, ['UserID' => $user->UserID,'Username'=>$user->Username, 'Email' => $user->Email]];
        }
        return [false, "Invalid Credentials", 401, null];
    }
}
