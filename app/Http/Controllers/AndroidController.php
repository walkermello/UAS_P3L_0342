<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Pengemudi;
use App\Models\Promo;
use App\Models\Transaksi;

class AndroidController extends Controller
{
    public function loginUser(Request $request)
    {
        $loginData = $request->all();
        $validate = Validator::make($loginData, [
            'email' => 'required|email',
            'password' => 'required|min:5|max:30'
        ]);

        if ($validate->fails())
        {
            return response(['message' => $validate->errors(), 400]);
        }

        if(!Auth::attempt($loginData))
        {
            return response(['message' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;

        return response([
            'message' => 'authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }

    public function showCustomer($id)
    {
        $user = DB::table('users')
        ->where('id',$id)
        ->first();
        
        if(!is_null($user))
        {
            return response([
                'message' => 'Retrieve User Success',
                'data' => $user
            ], 200);
        }

        return response([
            'message' => 'User Not Found',
            'data' => null
        ], 404);
    }

    public function showPromo()
    {
        $promo = DB::table('promos')->select('jenis','total','kode')->where('status','Available')->get();
        
        if(!is_null($promo))
        {
            return response([
                'message' => 'Retrieve Promo Success',
                'data' => $promo
            ], 200);
        }

        return response([
            'message' => 'Promo Not Found',
            'data' => null
        ], 404);
    }

    public function transaksiCustomer()
    {
        $tUser = array(
           'list'=>DB::table('transactions')->where('nama_customer','luis peter')->get() //ubah nama sesuai inputan mobile
        );

        if(!is_null($tUser))
        {
            return response([
                'message' => 'Retrieve Transaksi Success',
                'data' => $tUser
            ], 200);
        }

        return response([
            'message' => 'Transaksi Not Found',
            'data' => null
        ], 404);
    }

    public function showCar()
    {
        $cars = DB::table('cars')->select('id','name','type','transmisi','gas','color','bagasi','facility','harga')->where('status','Available')->get();

        if(!is_null($cars))
        {
            return response([
                'message' => 'Retrieve Cars Success',
                'data' => $cars
            ], 200);
        }

        return response([
            'message' => 'Cars Not Found',
            'data' => null
        ], 404);
    }
    
    public function showBrosur()
    {
        $brosurs = DB::table('cars')->select('id','name','type','transmisi','gas','color','bagasi','facility','harga')->where('status','Available')->get();

        if(!is_null($brosurs))
        {
            return response([
                'message' => 'Retrieve Brosurs Success',
                'data' => $brosurs
            ], 200);
        }

        return response([
            'message' => 'Brosurs Not Found',
            'data' => null
        ], 404);
    }

    public function showDriver($id)
    {
        $pengemudis = DB::table('pengemudis')
        ->where('id',$id)
        ->first();

        if(!is_null($pengemudis))
        {
            return response([
                'message' => 'Retrieve Pengemudis Success',
                'data' => $pengemudis
            ], 200);
        }

        return response([
            'message' => 'Pengemudis Not Found',
            'data' => null
        ], 404);
    }

    public function showAllCustomers()
    {
        $users = User::all();
        
        if(!is_null($users))
        {
            return response([
                'message' => 'Retrieve User Success',
                'user' => $users
            ], 200);
        }

        return response([
            'message' => 'User Not Found',
            'user' => null
        ], 404);
    }

    public function showAllDrivers()
    {
        $dataDriver = array(
            'list'=>DB::table('pengemudis')->get()
        );
        
        if(!is_null($dataDriver))
        {
            return response([
                'message' => 'Retrieve Driver Success',
                'data' => $dataDriver
            ], 200);
        }

        return response([
            'message' => 'Driver Not Found',
            'data' => null
        ], 404);
    }

    public function showAllTransaksis()
    {
        $dataTransaksi = array(
            'list'=>DB::table('transactions')->get()
        );
        
        if(!is_null($dataTransaksi))
        {
            return response([
                'message' => 'Retrieve Transaksi Success',
                'data' => $dataTransaksi
            ], 200);
        }

        return response([
            'message' => 'Transaksi Not Found',
            'data' => null
        ], 404);
    }

    //$report1 = DB::table('transactions')->select(array('mobil', DB::raw('COUNT(mobil) as jumlah')))->where('mobil','Avanza')->groupBy('mobil')->get();
}
