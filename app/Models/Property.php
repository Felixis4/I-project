<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','type','city_id','description','light','natural_gas','phone','water','sewers','internet','asphalt'];
    protected $casts = [
        'light' => 'boolean',
        'natural_gas' => 'boolean',
        'phone' => 'boolean',
        'water' => 'boolean',
        'sewers' => 'boolean',
        'internet' => 'boolean',
        'asphalt' => 'boolean',
    ];

    public function propertyable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__,'type','property_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(propertyImages::class, 'property_id','property_id');
    }
}
