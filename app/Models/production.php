<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class production extends Model
{
    use HasFactory;
    protected $table = 'production';
    protected $primaryKey = 'productionNo';
    public $timestamps= false;
    protected $keyType = 'string';

    protected $fillable =[
        'productionNo',
        'listId',
        'modelCode',
        'productQtty',
        'leadTime',
        'productionLeadTime',
        'productionStatus',
        'shortageList',
        'productionCreated',
        'productionUpdate',
        'Person'
    ];

}
