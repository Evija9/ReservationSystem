<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premises extends Model
{
    use HasFactory;

    protected $table = 'premisess';
    protected $fillable = ['title', 'address', 'city', 'description'];
}
