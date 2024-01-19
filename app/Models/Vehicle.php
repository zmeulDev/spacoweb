<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'vehicles';

    public static $searchable = [
        'name',
        'model',
        'vin',
        'type',
        'plates',
    ];

    protected $dates = [
        'manufacter_date',
        'purchase_date',
        'insurance',
        'inspection',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const OWNER_SELECT = [
        'Owner'   => 'Owner',
        'Rent'    => 'Rent',
        'Leasing' => 'Leasing',
        'Credit'  => 'Credit',
        'Other'   => 'Other',
    ];

    protected $fillable = [
        'name',
        'model',
        'vin',
        'type',
        'plates',
        'odometer',
        'manufacter_date',
        'purchase_date',
        'owner',
        'insurance',
        'inspection',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public const TYPE_SELECT = [
        'Micro'       => 'Micro',
        'Sedan'       => 'Sedan',
        'Hatchback'   => 'Hatchback',
        'Coupe'       => 'Coupe',
        'Convertible' => 'Convertible',
        'Wagon'       => 'Wagon',
        'Suv'         => 'Suv',
        'Van'         => 'Van',
        'Camper'      => 'Camper',
        'Truck'       => 'Truck',
        'Other'       => 'Other',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function vehicleContracts()
    {
        return $this->hasMany(Contract::class, 'vehicle_id', 'id');
    }

    public function vehicleTasks()
    {
        return $this->hasMany(Task::class, 'vehicle_id', 'id');
    }

    public function getManufacterDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setManufacterDateAttribute($value)
    {
        $this->attributes['manufacter_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPurchaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPurchaseDateAttribute($value)
    {
        $this->attributes['purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInsuranceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInsuranceAttribute($value)
    {
        $this->attributes['insurance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInspectionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInspectionAttribute($value)
    {
        $this->attributes['inspection'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
