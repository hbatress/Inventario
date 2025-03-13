<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persons extends Model
{

        use HasFactory, SoftDeletes;
    
        protected $primaryKey = 'UserID';
    
        protected $fillable = [
            'Username', 'PasswordHash', 'Email', 'RegistrationDate'
        ];
    
        public function roles()
        {
            return $this->belongsToMany(Role::class, 'user_roles', 'UserID', 'RoleID');
        }
    
        public function assets()
        {
            return $this->hasMany(assets_tablecls::class, 'CreatedBy', 'UserID');
        }
}
