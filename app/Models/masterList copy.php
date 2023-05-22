<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterList extends Model
{
    use HasFactory;
    protected $table = 'masterlist';
    protected $primaryKey = 'listId';
    public $timestamps= false;
}
