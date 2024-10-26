<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsReserv extends Model
{
    use HasFactory;

    protected $table = 'itemsreservs';
    protected $fillable = ['item_id', 'reservation_id'];
}
