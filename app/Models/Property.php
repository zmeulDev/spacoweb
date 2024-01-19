<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'properties';

    public static $searchable = [
        'name',
        'address',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'Owner' => 'Owner',
        'Rent'  => 'Rent',
        'Other' => 'Other',
    ];

    public const PARKING_SELECT = [
        'Garage'      => 'Garage',
        'Underground' => 'Underground',
        'Outside'     => 'Outside',
        'No_Parking'  => 'No Parking',
        'Other'       => 'Other',
    ];

    protected $fillable = [
        'name',
        'address',
        'type',
        'rooms',
        'bathrooms',
        'parking',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function propertyContracts()
    {
        return $this->hasMany(Contract::class, 'property_id', 'id');
    }

    public function propertiesTasks()
    {
        return $this->hasMany(Task::class, 'properties_id', 'id');
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
