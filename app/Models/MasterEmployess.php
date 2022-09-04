<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEmployess extends Model
{
    use HasFactory;
    protected $table = 'master_employess';
    protected $fillable = [
            'sector_id',
            'nip',
            'name',
            'jabatan',
            'path_photo'
    ];

    public function user(){
        return $this->hasOne(User::class,'employess_id','id');
    }

    public function sector(){
        return $this->belongsTo(MasterSector::class,'sector_id','id');
    }
}
