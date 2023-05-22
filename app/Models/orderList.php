<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderList extends Model
{
    use HasFactory;
    protected $table = 'orderlist';
    protected $primaryKey = 'orderListId';
    public $timestamps= false;

    protected $fillable =[
        'orderListTitle','memo','datecreated','dateUpdated','fixDate','isActive','orderCount'
    ];



}
