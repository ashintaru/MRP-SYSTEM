<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class componets extends Model
{
    use HasFactory;
    use Search;
    protected $table = 'component';
    protected $primaryKey = 'componentId';
    public $timestamps= false;
    protected $fillable =[
        'listId',
        'materialId',
        'fixedQtty',
        'componentsCreated',
        'componentUpdated'
    ];

    protected $searchable = [
        'materialId',
    ];

} 