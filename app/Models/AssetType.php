<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AssetType extends Model
{
    use HasFactory;

    protected $primaryKey = 'TypeID';

    protected $fillable = [
        'TypeName'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'TypeID', 'TypeID');
    }
}
