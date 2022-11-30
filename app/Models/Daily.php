<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table = 'daily';
    public $timestamps = false;
    protected $primaryKey = 'day';
    public $incrementing = false;
    use HasFactory;
}
