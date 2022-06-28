<?php

namespace App\Http\Controllers\Pengemudi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengemudi;
use Illuminate\Support\Facades\Auth;

class PengemudiController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
              'alamat'=> 'required|max:255',
              'tgl_lahir'=> 'required|date_format:Y-m-d',
              'email'=>'required|email|unique:pengemudis,email|max:255',
              'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
              'gender'=> 'required|in:pria,wanita',
              'bahasa'=> 'required|max:255',
              'foto'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'sim'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'bebas_napza'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'kesehatan_jiwa'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'kesehatan_jasmani'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'skck'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'status'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
              'harga_sewa'=>'required|numeric',
              'rating'=>'required|between:0,99.99',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = "foto".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name);
            }
            if ($request->hasFile('sim')) {
                $image = $request->file('sim');
                $name2 = "sim".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name2);
            }
            if ($request->hasFile('bebas_napza')) {
                $image = $request->file('bebas_napza');
                $name3 = "napza".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name3);
            }
            if ($request->hasFile('kesehatan_jiwa')) {
                $image = $request->file('kesehatan_jiwa');
                $name4 = "jiwa".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name4);
            }
            if ($request->hasFile('kesehatan_jasmani')) {
                $image = $request->file('kesehatan_jasmani');
                $name5 = "jasmani".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name5);
            }
            if ($request->hasFile('skck')) {
                $image = $request->file('skck');
                $name6 = "skck".'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('storage\pengemudi');
                $image->move($destinationPath, $name6);
            }

            $pengemudi = new Pengemudi();
            $pengemudi->name = $request->name;
            $pengemudi->alamat = $request->alamat;
            $pengemudi->tgl_lahir = $request->tgl_lahir;
            $pengemudi->email = $request->email;
            $pengemudi->no_telp = $request->no_telp;
            $pengemudi->gender = $request->gender;
            $pengemudi->bahasa = $request->bahasa;
            $pengemudi->foto = $name;
            $pengemudi->sim = $name2;
            $pengemudi->bebas_napza = $name3;
            $pengemudi->kesehatan_jiwa = $name4;
            $pengemudi->kesehatan_jasmani = $name5;
            $pengemudi->skck = $name6;
            $pengemudi->status = $request->status;
            $pengemudi->harga_sewa = $request->harga_sewa;
            $pengemudi->rating = $request->rating;
            $pengemudi->password = \Hash::make($request->password);
            $save = $pengemudi->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:pengemudis,email|max:255',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on pengemudis table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('pengemudi')->attempt($creds) ){
            return redirect()->route('pengemudi.home');
        }else{
            return redirect()->route('pengemudi.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('pengemudi')->logout();
        return redirect('/');
    }

    public function edit($id)
    {
        $row = DB::table('pengemudis')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];

        return view('dashboard.pengemudi.update',$data);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'alamat'=> 'required|max:255',
            'tgl_lahir'=> 'required|date_format:Y-m-d',
            'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
            'gender'=> 'required|in:pria,wanita',
            'status'=> 'required|in:Available,Busy'
        ]);

        $updating = DB::table('pengemudis')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'alamat'=>$request->input('alamat'),
                        'tgl_lahir'=>$request->input('tgl_lahir'),
                        'no_telp'=>$request->input('no_telp'),
                        'gender'=>$request->input('gender'),
                        'status'=>$request->input('status'),
                    ]);

        return redirect('pengemudi/home');
    }

    public function index(){
        $data = array(
            'list'=>DB::table('pengemudis')->get()
        );
        return redirect('pengemudi/home',$data);
    }

    public function delete($id)
    {
        Pengemudi::destroy($id);
        
        return redirect('pengemudi/login');
    }
}