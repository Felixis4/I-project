<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyImages extends Model
{
    use HasFactory;
    protected $fillable = ['property_id','path','mime_type'];
}
