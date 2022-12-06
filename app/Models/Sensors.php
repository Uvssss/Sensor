<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    protected $table = 'sensor';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'max_temp',
        'min_temp',
        'average_temp',
        'average_humid',
        'min_humid',
        'max_humid',
        'sensor_id',
    ];
    public $incrementing = true;
    use HasFactory;
}
