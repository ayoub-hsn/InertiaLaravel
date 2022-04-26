<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','ville','adress'];

    public function vehicles(){
        return $this->belongsToMany(Vehicle::class,'vehicle_driver');
    }
}
