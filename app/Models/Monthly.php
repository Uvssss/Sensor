<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    protected $table = 'monthly';
    public $timestamps = false;
    protected $primaryKey = 'month';
    public $incrementing = false;
    use HasFactory;
}
