<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

        use HasFactory;
    
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
            return $this->hasMany(Asset::class, 'CreatedBy', 'UserID');
        }
}
