<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremisessReserv extends Model
{
    use HasFactory;

    protected $table = 'premisessreservs';
    protected $fillable = ['premises_id', 'reservation_id'];
}
