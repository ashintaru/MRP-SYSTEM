<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shortageList extends Model
{
    use HasFactory;
    protected $table = 'shortagelist';
    protected $primaryKey = 'idshortagelist';
    public $timestamps= false;
    
    protected $fillable =[
        'productionId',
        'dateCreated',
        'dateUpdated'
    ];
}

