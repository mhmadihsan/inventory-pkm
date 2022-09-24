<?php

namespace App\Http\Controllers;

use App\Models\TrxArciveFile;
use App\Services\ArciveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArciveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->tools = new ArciveService();
    }

    public function index(Request $request){
        $year = getCureentYear();
        $month = getCureentMonth();
        $category = $this->tools->getCategory();
        return view('arcive.index',[
            'now'=>now(),
            'year'=>$year,
            'month'=>$month,
            'category'=>$category
        ]);
    }

    public function data(Request $request){
        if($request->type=='monthly'){
            $draft = TrxArciveFile::with('user','category')
                ->where('year',$request->year)
                ->where('month',$request->month)
                ->get()
                ->sortByDesc('uploaded_at');
        }
        else{
            $draft = TrxArciveFile::with('user','category')
                ->where('year',$request->year)
                ->get()
                ->sortByDesc('uploaded_at');
        }
        $data = $this->tools->manipulate($draft);
        return view('arcive._data2',[
            'data'=>$data->groupBy('category.name')
        ]);
    }

    public function getdata(int $id){
        $result = TrxArciveFile::findOrFail($id);
        return response()->json($result);
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(),[
            'tahun'=>'required',
            'bulan'=>'required|numeric',
            'nama_file'=>'required|min:4',
            'keterangan'=>'nullable|min:3',
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required|max:500000',
                'extension'      => 'required|in:doc,docx,csv,xlsx,xls,docx,ppt',
            ]
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            $this->tools->StoreArcive($request);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil memperbaharui Data",
        ]);
    }

    public function update(Request $request){
        $validator = Validator::make(request()->all(),[
            'tahun'=>'required',
            'bulan'=>'required|numeric',
            'nama_file'=>'required|min:4',
            'keterangan'=>'nullable|min:3',
            'id'=>'required',
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required|max:500000',
                'extension'      => 'required|in:doc,docx,csv,xlsx,xls,docx,ppt',
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "messages" => $validator->errors()->first(),
            ]);
        }
        else{
            $this->tools->UpdateArcive($request);
        }
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil memperbaharui Data",
        ]);
    }

    public function delete(int $id){
        try {
            TrxArciveFile::findOrFail($id)
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
}
