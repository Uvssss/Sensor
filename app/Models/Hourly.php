<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hourly extends Model
{
    use HasFactory;
    protected $table = 'hourly';
    public $timestamps = false;
    protected $fillable = [
        'hour',
        'max_temp',
        'min_temp',
        'average_temp',
        'average_humid',
        'min_humid',
        'max_humid',
        'sensor_id',
    ];
    protected $primaryKey = 'hour';
    public $incrementing = false;
}
