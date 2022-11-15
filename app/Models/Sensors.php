<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    protected $table = 'sensor';

    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
}
