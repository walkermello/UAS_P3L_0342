<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'id_role' => 'required',
              'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
              'alamat'=> 'required|max:255',
              'tgl_lahir'=> 'required|date_format:Y-m-d',
              'email'=>'required|email|unique:karyawans,email|max:255',
              'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
              'gender'=> 'required|in:pria,wanita',
              'foto'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $karyawan = new Karyawan();
          $karyawan->id_role = $request->id_role;
          $karyawan->name = $request->name;
          $karyawan->alamat = $request->alamat;
          $karyawan->tgl_lahir = $request->tgl_lahir;
          $karyawan->email = $request->email;
          $karyawan->no_telp = $request->no_telp;
          $karyawan->gender = $request->gender;
          $karyawan->foto = $request->foto;
          $karyawan->password = \Hash::make($request->password);
          $save = $karyawan->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:karyawans,email|max:255',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on karyawans table'
        ]);

        //$query = DB::table('karyawans')->select('id_role')->where('email','=',$request->email)->where('password','=',$request->password)->first();
        $creds = $request->only('email','password');
        if( Auth::guard('karyawan')->attempt($creds) ){
            return redirect()->route('karyawan.home'); 
        }else{
            return redirect()->route('karyawan.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('karyawan')->logout();
        return redirect('/');
    }

    public function edit($id)
    {
        $row = DB::table('karyawans')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];

        return view('dashboard.karyawan.update',$data);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'alamat'=> 'required|max:255',
            'tgl_lahir'=> 'required|date_format:Y-m-d',
            'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
            'gender'=> 'required|in:pria,wanita'
        ]);

        $updating = DB::table('karyawans')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'alamat'=>$request->input('alamat'),
                        'tgl_lahir'=>$request->input('tgl_lahir'),
                        'no_telp'=>$request->input('no_telp'),
                        'gender'=>$request->input('gender'),
                    ]);

        return redirect('karyawan/home');
    }

    public function index(){
        $data = array(
            'list'=>DB::table('karyawans')->get()
        );
        return redirect('karyawan/home',$data);
    }

    public function delete($id)
    {
        Karyawan::destroy($id);
        
        return redirect('karyawan/login');
    }
}