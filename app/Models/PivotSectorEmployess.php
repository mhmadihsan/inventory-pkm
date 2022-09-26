<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotSectorEmployess extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'employess_sector';

    protected $fillable = [
            'master_sector_id',
            'employess_id',
    ];
}
