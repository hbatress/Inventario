<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'RoleID';

    protected $fillable = [
        'RoleName'
    ];

    public function users()
    {
        return $this->belongsToMany(Person::class, 'user_roles', 'RoleID', 'UserID');
    }
}
