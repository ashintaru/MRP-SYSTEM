<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $primaryKey = 'inventoryId';
    public $timestamps= false;
    protected $fillable =[
        'inventoryId',
        "materialId",
        'currentQtty',
        'invCreated',
        'invUpdated'
    ];
}
