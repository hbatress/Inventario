<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
