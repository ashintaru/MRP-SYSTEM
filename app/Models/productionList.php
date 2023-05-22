<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productionList extends Model
{
    use HasFactory;
    protected $table = 'productionlist';
    protected $primaryKey = 'idProductionList';
    public $timestamps= false;

    protected $fillable =[
        'title',
        'memo',
        'created_at',
        'updated_at',
        'finalDate',
        'dateCreated',
        'dataUpdated',
        'isActive'
    ];
}
