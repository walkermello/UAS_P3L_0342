<?php

namespace App\Http\Controllers\Promo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{

    public function show(){
        $promos = DB::table('promos')->select('jenis','total','kode')->where('status','Available')->get();
        return view('promo')->with('promos', $promos);
    }

    public function index()
    {

        $data = array(
           'list'=>DB::table('promos')->get()
        );
        return view("aturPromo",$data);
    }

    function add(Request $request){
        //Validate Inputs
        $request->validate([
            'jenis'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'keterangan'=> 'required|max:255',
            'total'=> 'required|numeric|between:0,1.0',
            'status'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'kode'=> 'required|regex:/^([A-Z]+)(\s[A-Z]+)*$/|max:255'
        ]);

        $query = DB::table('promos')->insert([
            'jenis'=>$request->input('jenis'),
            'keterangan'=>$request->input('keterangan'),
            'total'=>$request->input('total'),
            'status'=>$request->input('status'),
            'kode'=>$request->input('kode'),
        ]);
    
        if($query){
            return back()->with('success','Data Inserted Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong, Please Try Again');
        }
    }
        function edit($id){
            $row = DB::table('promos')
                    ->where('id',$id)
                    ->first();
            $data = [
                'Info' => $row,
                'Title'=>'Edit', 
            ];
            return view('editPromo', $data);
        }
    
        function update(Request $request)
        {
            $request->validate([
                'jenis'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
                'keterangan'=> 'required|max:255',
                'total'=> 'required|numeric|between:0,1.0',
                'status'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
                'kode'=> 'required|regex:/^([A-Z]+)(\s[A-Z]+)*$/|max:255'
            ]);
    
            $updating = DB::table('promos')
                            ->where('id', $request->input('cid'))
                            ->update([
                                'jenis'=>$request->input('jenis'),
                                'keterangan'=>$request->input('keterangan'),
                                'total'=>$request->input('total'),
                                'status'=>$request->input('status'),
                                'kode'=>$request->input('kode'),
                            ]);
            return redirect('diskon');  
        }
    
        function delete($id){
            $delete = DB::table('promos')
                        ->where('id', $id)
                        ->delete();
            return redirect('diskon');
        }
  
}
