<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $primaryKey = 'accId';
    protected $table = 'accounts';
    public $timestamps= false;

    use HasFactory;
    protected $fillable =[
        'typeId',
        "accUserName",
        'accPassWord',
        'fName',
        'mName',
        'lName',
        'dateCreated',
        'dateUpdated',
        'isActive'
    ];
}
