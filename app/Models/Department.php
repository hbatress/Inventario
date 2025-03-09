<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'DepartmentID';

    protected $fillable = [
        'DepartmentName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'DepartmentID', 'DepartmentID');
    }
}
