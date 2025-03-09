<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
