<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    protected $table = 'weekly';
    public $timestamps = false;
    protected $primaryKey = ["date","end_date"];
    protected $fillable = [
        'date',
        'end_date',
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
