<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'LocationID';

    protected $fillable = [
        'LocationName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'LocationID', 'LocationID');
    }
}
