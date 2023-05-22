<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invLogs extends Model
{
    use HasFactory;
    protected $table = 'loginv';
    protected $primaryKey = 'logId';
    public $timestamps= false;
    protected $keyType = 'string';

    protected $fillable =[
        'logId',
        'materialId',
        'action',
        'value',
        'remark',
        'date'
    ];


}
