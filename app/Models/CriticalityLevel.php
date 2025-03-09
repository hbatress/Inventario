<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriticalityLevel extends Model
{
    use HasFactory;

    protected $primaryKey = 'CriticalityID';

    protected $fillable = [
        'CriticalityName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'CriticalityID', 'CriticalityID');
    }
}
