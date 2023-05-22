<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shortageMats extends Model
{
    use HasFactory;
    protected $table = 'shortagematerials';
    protected $primaryKey = 'idshortagematerials';
    public $timestamps= false;
    protected $fillable =[
        'shortagelistId',
        'materialCode',
        'materialqtty'
    ];
}
