<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table = 'daily';
    public $timestamps = false;
    protected $fillable = [
        'date',
        'max_temp',
        'min_temp',
        'average_temp',
        'average_humid',
        'min_humid',
        'max_humid',
        'sensor_id',
    ];
    protected $primaryKey = 'date';
    public $incrementing = false;
    use HasFactory;
}
