<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $primaryKey = 'ActionID';

    protected $fillable = [
        'ActionName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'ActionID', 'ActionID');
    }
}
