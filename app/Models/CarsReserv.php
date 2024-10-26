<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsReserv extends Model
{
    use HasFactory;

    protected $table = 'carsreservs';
    protected $fillable = ['car_id', 'reservation_id'];
}
