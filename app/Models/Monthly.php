<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    protected $table = 'monthly';
    public $timestamps = false;
    protected $primaryKey = 'month';
    protected $fillable = [
        'month',
        'max_temp',
        'min_temp',
        'average_temp',
        'average_humid',
        'min_humid',
        'max_humid',
        'sensor_id',
    ];
    public $incrementing = false;
    use HasFactory;
}
