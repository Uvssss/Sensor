<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    protected $table = 'weekly';
    public $timestamps = false;
    protected $primaryKey = 'week';
    public $incrementing = false;
    use HasFactory;
}
