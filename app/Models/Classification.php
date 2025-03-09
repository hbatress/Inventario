<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
