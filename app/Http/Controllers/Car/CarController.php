<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show(){
        $cars = DB::table('cars')->select('id','name','type','transmisi','gas','color','bagasi','facility','harga')->where('status','Available')->get();
        return view('car')->with('cars', $cars);
    }

    public function showByDate(){
        $query = DB::table('cars')
            ->whereRaw('DATEDIFF(kontrak_mulai,kontrak_selesai) < 15')->get();

        return view('kontrak')->with('cars', $query);
    }

    public function index()
    {

        $data = array(
           'list'=>DB::table('cars')->get()
        );
        return view("aset",$data);
    }

    function add(Request $request){
        //Validate Inputs
        $request->validate([
        ]);

        $query = DB::table('cars')->insert([
            'no_ktp'=>$request->input('no_ktp'),
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'transmisi'=>$request->input('transmisi'),
            'gas'=>$request->input('gas'),
            'color'=>$request->input('color'), 
            'capacity'=>$request->input('capacity'),
            'facility'=>$request->input('facility'),
            'plat'=>$request->input('plat'),
            'stnk'=>$request->input('stnk'),
            'kategori'=>$request->input('kategori'),
            'kontrak_mulai'=>$request->input('kontrak_mulai'),
            'kontrak_selesai'=>$request->input('kontrak_selesai'),
            'service'=>$request->input('service'),
            'bagasi'=>$request->input('bagasi'),
            'harga'=>$request->input('harga'),
            'status'=>$request->input('status'),
        ]);
    
        if($query){
            return back()->with('success','Data Inserted Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong, Please Try Again');
        }
    }

    function edit($id){
        $row = DB::table('cars')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
            'Title'=>'Edit', 
        ];
        return view('editAset', $data);
    }

    function update(Request $request)
    {
        $request->validate([
            'no_ktp'=>'required|numeric|digits:16',
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'type'=> 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'transmisi'=> 'required|max:255',
            'gas'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'color'=> 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'capacity'=> 'required|max:255',
            'facility'=> 'required|max:255',
            'plat'=>'required|max :10',
            'stnk'=>'required|numeric|digits:8',
            'kategori'=>'nullable',
            'kontrak_mulai'=>'required|date_format:Y-m-d',
            'kontrak_selesai'=>'required|date_format:Y-m-d',
            'service'=>'required|date_format:Y-m-d',
            'bagasi'=>'required|numeric',
            'harga'=>'required|numeric',
            'status'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255'
        ]);

        $updating = DB::table('cars')
                        ->where('id', $request->input('cid'))
                        ->update([
                            'no_ktp'=>$request->input('no_ktp'),
                            'name'=>$request->input('name'),
                            'type'=>$request->input('type'),
                            'transmisi'=>$request->input('transmisi'),
                            'gas'=>$request->input('gas'),
                            'color'=>$request->input('color'), 
                            'capacity'=>$request->input('capacity'),
                            'facility'=>$request->input('facility'),
                            'plat'=>$request->input('plat'),
                            'stnk'=>$request->input('stnk'),
                            'kategori'=>$request->input('kategori'),
                            'kontrak_mulai'=>$request->input('kontrak_mulai'),
                            'kontrak_selesai'=>$request->input('kontrak_selesai'),
                            'service'=>$request->input('service'),
                            'bagasi'=>$request->input('bagasi'),
                            'harga'=>$request->input('harga'),
                            'status'=>$request->input('status'),
                        ]);
        return redirect('aset');  
    }

    function delete($id){
        $delete = DB::table('cars')
                    ->where('id', $id)
                    ->delete();
        return redirect('aset');
    }
}
