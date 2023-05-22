<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'orderNo';
    public $timestamps= false;
    protected $keyType = 'string';

    protected $fillable =[
        'orderNo' , 
        'ordListId' , 'materialCode' , 'orderQtty' , 'orderTrans ', 'orderCreated' , 'orderUpdate' , 'orderDate' , 'accId' , 'orderStatus' 
    ];

}
