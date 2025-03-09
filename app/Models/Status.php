<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Status extends Model
{
    use HasFactory;

    protected $primaryKey = 'StatusID';

    protected $fillable = [
        'StatusName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'StatusID', 'StatusID');
    }
}
