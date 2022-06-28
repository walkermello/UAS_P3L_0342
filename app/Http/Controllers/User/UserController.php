<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class UserController extends Controller
{
    function create(Request $request)
    {
          $date = Carbon::now()->format('dmy');
          $cus_id = DB::table('users')->count('id')+1;
          $new = 'CUS-'.$date.$cus_id;
        
          $request->validate([
              'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
              'alamat'=> 'required|max:255',
              'tgl_lahir'=> 'required|date_format:Y-m-d',
              'email'=>'required|email|unique:users,email|max:255',
              'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
              'gender'=> 'required|in:pria,wanita',
              'sim'=> 'nullable||image|mimes:jpg,jpeg,png|max:1999',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          if ($request->hasFile('sim')) {
            $image = $request->file('sim');
            $name7 = "sim".'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage\user');
            $image->move($destinationPath, $name7);
            }

          $user = new User();
          $user->cus_id = $new;
          $user->name = $request->name;
          $user->alamat = $request->alamat;
          $user->tgl_lahir = $request->tgl_lahir;
          $user->email = $request->email;
          $user->no_telp = $request->no_telp;
          $user->gender = $request->gender;
          $user->sim = $name7;
          $user->password = \Hash::make($request->password);
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email|max:255',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function edit($id)
    {
        $row = DB::table('users')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];

        return view('dashboard.user.update',$data);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'alamat'=> 'required|max:255',
            'tgl_lahir'=> 'required|date_format:Y-m-d',
            'no_telp'=> 'required|regex:/(08)[0-9]{9}/',
            'gender'=> 'required|in:pria,wanita',
            'password'=>'required|min:5|max:30'
        ]);

        $updating = DB::table('users')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'alamat'=>$request->input('alamat'),
                        'tgl_lahir'=>$request->input('tgl_lahir'),
                        'no_telp'=>$request->input('no_telp'),
                        'gender'=>$request->input('gender'),
                        'password'=> \Hash::make($request->input('password')),
                    ]);

        return redirect('user/home');
    }

    public function delete($id)
    {
        User::destroy($id);
        
        return redirect('user/login');
    }
}