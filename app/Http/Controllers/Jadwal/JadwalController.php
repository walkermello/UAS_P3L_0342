<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Karyawan;

class JadwalController extends Controller
{
    public function index()
    {

        $data = array(
           'list'=>DB::table('jadwals')->get()
        );
        return view("dashboard.jadwal.index",$data);
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255|exists:karyawans,name',
            'hari_kerja'=>'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'shift'=>'required|in:shift-1,shift-2'
        ]);

        $query = DB::table('jadwals')->insert([
            'name'=>$request->input('name'),
            'hari_kerja'=>$request->input('hari_kerja'),
            'shift'=>$request->input('shift'),
        ]);
        
        if($query){
            return back()->with('success','Data Inserted Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong, Please Try Again');
        }
    }

    function ganti($id){
        $row = DB::table('jadwals')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];
        return view('editJadwal', $data);
    }

    public function gantiJadwal(Request $request){
        $request->validate([
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255|exists:karyawans,name',
            'hari_kerja'=>'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'shift'=>'required|in:shift-1,shift-2'
        ]);

        $updating = DB::table('jadwals')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'hari_kerja'=>$request->input('hari_kerja'),
                        'shift'=>$request->input('shift'),
                    ]);

        return redirect('dapatkan');
    }
}
