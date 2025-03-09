<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssetID';

    protected $fillable = [
        'Code', 'Name', 'TypeID', 'LocationID', 'DepartmentID', 'StatusID', 'ClassificationID', 'CriticalityID', 'ActionID', 'CreatedBy'
    ];

    public function type()
    {
        return $this->belongsTo(AssetType::class, 'TypeID', 'TypeID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID', 'LocationID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'StatusID', 'StatusID');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'ClassificationID', 'ClassificationID');
    }

    public function criticality()
    {
        return $this->belongsTo(CriticalityLevel::class, 'CriticalityID', 'CriticalityID');
    }

    public function action()
    {
        return $this->belongsTo(Action::class, 'ActionID', 'ActionID');
    }

    public function creator()
    {
        return $this->belongsTo(Person::class, 'CreatedBy', 'UserID');
    }
}
