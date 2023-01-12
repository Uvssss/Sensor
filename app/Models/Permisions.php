<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisions extends Model
{
    protected $table = 'permisions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
}
