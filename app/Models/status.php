<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'statusId';
    public $timestamps= false;
    use HasFactory;
}
