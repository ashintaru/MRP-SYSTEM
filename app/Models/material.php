<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $primaryKey = 'materialId';
    public $timestamps= false;

    protected $fillable =[
        'materialCode',
        'materialDetailed',
        'threshold',
        'inventoryId',
        'vendorId',
        'materialCreate',
        'materialUpdate',
        'isActive'
    ];
    
}
