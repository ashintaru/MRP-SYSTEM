<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'typeId';
    public $timestamps= false;
    use HasFactory;
}

