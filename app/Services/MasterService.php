<?php

namespace App\Services;

use App\Models\MasterCategory;
use App\Models\MasterEmployess;
use App\Models\MasterSector;
use App\Models\User;

class MasterService
{
    public function __construct()
    {
        //
    }

    public function SectorData(){
        return MasterSector::get();
    }

    public function CategoryData(){
        return MasterCategory::with('sector')
                            ->get();
    }

    public function EmployessData(){
        return MasterEmployess::with('sector')
                            ->get();
    }

    public function userDaata($role=null){
        if(is_null($role)){
            $data = User::get()->filter(function ($val){
                return $val->roles->where('name','!=','superadmin')->first();
            });
        }
        else{
            $data = User::get()->filter(function ($val)use($role){
                return $val->roles->where('name',$role)->first();
            });
        }
        return $data;
    }
}
