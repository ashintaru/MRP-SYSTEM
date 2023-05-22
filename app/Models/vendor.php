<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    use Search;
    protected $table = 'origin';
    protected $primaryKey = 'vendorId';
    public $timestamps= false;
    protected $fillable =[
        'vendorName',
        'vendorLotSize',
        'vendorLeadTime',
        'MOT',
        'vendorCreated',
        'vendorUpdate',
        'vendorStatus'
    ];

    protected $searchable = [

        'vendorName',
    ];
}
