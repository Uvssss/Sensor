<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'phone_number',
        'website',
        'text'
    ];
    public $incrementing = true;
    use HasFactory;
}
