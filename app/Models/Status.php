<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
