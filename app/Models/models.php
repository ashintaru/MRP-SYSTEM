<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;
    protected $table = 'model';
    protected $primaryKey = 'modelId';
    public $timestamps= false;
    protected $fillable =[
        'mCode',    
        'modelName',
        'modelCreate',
        'modelUpdate',
        'isActive'
    ];
}
