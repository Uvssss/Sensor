<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currently extends Model
{
    use HasFactory;
    protected $table = 'currently';
    public $timestamps = false;
    protected $primaryKey = 'time';
    public $incrementing = false;
}
