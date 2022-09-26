<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use App\Models\MasterEmployess;
use App\Models\MasterSector;
use App\Models\PivotSectorEmployess;
use App\Models\Role;
use App\Models\User;
use App\Models\V2\Transaksi\TrxLkjipTriwulan;
use App\Services\MasterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function __construct(){
        $this->tools = new MasterService();
    }

    public function index_sector(){
        $data = $this->tools->SectorData();
        return view('master.sector.index',[
            'data'=>$data
        ])->with('no',1);
    }

    public function add_sector(){
        return view('master.sector.add');
    }

    public function edit_sector(int $id){
        $data = MasterSector::findOrFail($id);
        return view('master.sector.edit',[
            'data'=>$data
        ]);
    }

    public function edit_category(int $id){
        $sector = MasterSector::all();
        $data = MasterCategory::findOrFail($id);
        return view('master.category.edit',[
            'data'=>$data,
            'sector'=>$sector
        ]);
    }

    public function edit_user(int $id){
        $data = User::findOrFail($id);
        $role = Role::where('name','!=','superadmin')->get();
        $employess = MasterEmployess::get();
        return view('master.user.edit',[
            'role'=>$role,
            'data'=>$data,
            'employess'=>$employess
        ]);
    }

    public function edit_employess(int $id){
        $sector = MasterSector::all();
        $data = MasterEmployess::findOrFail($id);
        return view('master.employess.edit',[
            'sector'=>$sector,
            'data'=>$data
        ]);
    }

    public function store_sector(Request $request){
        $validator = Validator::make(request()->all(),[
            'nama'=>'required',
            'deskripsi'=>'nullable|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            MasterSector::updateOrCreate(
                [
                    'id'=>$request->id,
                ],
                [
                    'name'=>$request->nama,
                    'description'=>$request->deskripsi,
                ]
            );
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menambahkan Data",
        ]);
    }

    public function store_category(Request $request){
        $validator = Validator::make(request()->all(),[
            'bidang'=>'required',
            'nama'=>'required',
            'deskripsi'=>'nullable|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            MasterCategory::updateOrCreate(
                [
                    'id'=>$request->id,
                ],
                [
                    'sector_id'=>$request->bidang,
                    'name'=>$request->nama,
                    'description'=>$request->deskripsi,
                ]
            );
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menambahkan Data",
        ]);
    }

    public function store_user(Request $request){
        $validator = Validator::make(request()->all(),[
            'pegawai'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
            'role'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            $employess = MasterEmployess::findOrFail($request->pegawai);
            $stored = User::create([
                'employess_id'=>$employess->id,
                'name'=>$employess->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            $stored->attachRole($request->role);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menambahkan Data",
        ]);
    }

    public function update_user($id, Request $request){
        $validator = Validator::make(request()->all(),[
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'nullable|min:5',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            $update = User::findOrFail($id);
            $update->email = $request->email;
            if($request->password!=null){
                $update->password = bcrypt($request->password);
            }
            $update->update();
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil memperbaharui Data",
        ]);
    }

    public function store_employess(Request $request){
        $validator = Validator::make(request()->all(),[
            'bidang'=>'required',
            'nomor'=>'required',
            'nama'=>'required|min:3',
            'jabatan'=>'required|min:3'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{

            $data = MasterEmployess::updateOrCreate(
                        [
                            'id'=>$request->id,
                        ],
                        [
                            'sector_id'=>null,
                            'nip'=>$request->nomor,
                            'name'=>$request->nama,
                            'jabatan'=>$request->jabatan,
                        ]
                    );
            if($request->has('id')){
                foreach ($request->bidang as $b){
                    $this->sysSector($request->id,$b);
                }
            }
            else{
                foreach ($request->bidang as $b){
                    $this->sysSector($data->id,$b);
                }
            }
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menambahkan Data",
        ]);
    }

    public function delete_sector(int $id){
        try {
            MasterSector::findOrFail($id)
                            ->delete();
        }
        catch (\Throwable $th){
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal menghapus Data ".$th->getMessage(),
            ]);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menhapus Data",
        ]);
    }

    public function delete_category(int $id){
        try {
            MasterCategory::findOrFail($id)
                ->delete();
        }
        catch (\Throwable $th){
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal menghapus Data ".$th->getMessage(),
            ]);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menhapus Data",
        ]);
    }

    public function delete_employess(int $id){
        try {
            MasterEmployess::findOrFail($id)
                ->delete();
        }
        catch (\Throwable $th){
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal menghapus Data ".$th->getMessage(),
            ]);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menhapus Data",
        ]);
    }

    public function delete_user(int $id){
        try {
            User::findOrFail($id)
                ->delete();
        }
        catch (\Throwable $th){
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal menghapus Data ".$th->getMessage(),
            ]);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil menhapus Data",
        ]);
    }

    public function index_category(){
        $data = $this->tools->CategoryData();
        return view('master.category.index',[
            'data'=>$data
        ])->with('no',1);
    }

    public function add_category(Request $request){
        $sector = MasterSector::all();
        return view('master.category.add',[
            'sector'=>$sector
        ]);
    }

    public function add_user(){
        $role = Role::where('name','!=','superadmin')->get();
        $employess = MasterEmployess::get()->filter(function ($val){
            return is_null($val->user);
        });
        return view('master.user.add',[
            'employess'=>$employess,
            'role'=>$role
        ]);
    }

    public function index_employess(){
        $data = $this->tools->EmployessData();
        return view('master.employess.index',[
            'data'=>$data
        ])->with('no',1);
    }

    public function add_employess(){
        $sector = MasterSector::all();
        return view('master.employess.add',[
            'sector'=>$sector
        ]);
    }

    public function index_user(){
        $data = $this->tools->userDaata();
        $roles = Role::where('name','!=','superadmin')->get();
        return view('master.user.index',[
            'data'=>$data,
            'role'=>$roles
        ])->with('no',1);
    }

    private function sysSector($EmployessId, $SectorId){
        PivotSectorEmployess::updateOrCreate(
            [
                'master_sector_id'=>$SectorId,
                'employess_id'=>$EmployessId,
            ],
            [
                'master_sector_id'=>$SectorId,
                'employess_id'=>$EmployessId,
            ]
        );
    }
}
