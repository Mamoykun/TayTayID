<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qris extends Model
{
    use HasFactory;
    protected $table='qris';
    protected $guarded=['id'];
}
