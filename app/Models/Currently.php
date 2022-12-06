<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currently extends Model
{
    use HasFactory;
    protected $table = 'currently';
     protected $fillable = ['time', 'humid', 'temp','sensor_id'];
    public $timestamps = false;
    protected $primaryKey = 'time';

    public $incrementing = false;
}
