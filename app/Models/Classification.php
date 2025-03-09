<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Classification extends Model
{
    use HasFactory;

    protected $primaryKey = 'ClassificationID';

    protected $fillable = [
        'ClassificationName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'ClassificationID', 'ClassificationID');
    }
}
