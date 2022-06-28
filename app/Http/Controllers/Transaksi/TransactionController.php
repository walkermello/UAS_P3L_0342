<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Pengemudi;
use App\Models\Karyawan;
use App\Models\Car;
use App\Models\Promo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class TransactionController extends Controller
{
    function add(Request $request){
        
        $date = Carbon::now()->format('dmy');
        $trn_id = DB::table('transactions')->count('id')+1;
        $new = 'TRN-'.$date.$trn_id;

        $request->validate([
            'nama_customer'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'ktp'=> 'required|numeric|digits:16',
            'sim'=> 'nullable|numeric|digits:12',
            'tanggal'=>'required|date_format:Y-m-d',
            'tgl_mulai'=> 'required|date_format:Y-m-d',
            'tgl_selesai'=> 'required|date_format:Y-m-d',
            'metode_pembayaran'=>'required|in:Tunai,Kredit'
        ]);

        $query = DB::table('transactions')->insert([
            'trn_id' => $new,
            'nama_customer'=>$request->input('nama_customer'),
            'ktp'=>$request->input('ktp'),
            'sim'=>$request->input('sim'),
            'tanggal'=>$request->input('tanggal'),
            'tgl_mulai'=>$request->input('tgl_mulai'),
            'tgl_selesai'=>$request->input('tgl_selesai'),
            'mobil'=>$request->input('mobil'),
            'plat'=>$request->input('plat'),
            'harga_sewa'=>$request->input('harga_sewa'),
            'driver'=>$request->input('driver'),
            'telp_driver'=>$request->input('telp_driver'),
            'tarif_driver'=>$request->input('tarif_driver'),
            'metode_pembayaran'=>$request->input('metode_pembayaran'),
            'sub_total'=>$request->input('sub_total'),
        ]);

        if($query){
            return back()->with('success','Data Inserted Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong, Please Try Again');
        }
    }

    function book($id){
        $userId = Auth::id();
        $row = DB::table('cars')->select('id','name','plat','harga')
                ->where('id',$id)
                ->first();
        $row2 = DB::table('users')->select('id','name')
                ->where('id',$userId)
                ->first();
        $row3 = DB::table('pengemudis')->select('id','name','no_telp','harga_sewa')
                ->where('status','Available')
                ->first();
        $data = [
            'Info' => $row,
            'Info2' => $row2,
            'Info3' => $row3,
            'Info4' => $row3->harga_sewa+$row->harga,
        ];
        return view('book', $data);
    }

    public function index()
    {
        $name = Auth::user()->name;
        $data = array(
           'list'=>DB::table('transactions')->where('nama_customer',$name)->get()
        );
        return view("histori",$data);
    }

    function edit($id){
        $row = DB::table('transactions')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
            'Title'=>'Edit', 
        ];
        return view('editTransaksi', $data);
    }


    function update(Request $request)
    {
        $request->validate([
            'ktp'=> 'required|numeric|digits:16',
            'tgl_mulai'=> 'required|date_format:Y-m-d',
            'tgl_selesai'=> 'required|date_format:Y-m-d',
            'metode_pembayaran'=>'required|in:Tunai,Kredit'
        ]);

        $updating = DB::table('transactions')
                        ->where('id', $request->input('cid'))
                        ->update([
                            'ktp'=>$request->input('ktp'),
                            'tgl_mulai'=>$request->input('tgl_mulai'),
                            'tgl_selesai'=>$request->input('tgl_selesai'),
                            'metode_pembayaran'=>$request->input('metode_pembayaran'),
                        ]);
        return redirect('user/home');  
    }

    function tambahRating($id){
        $row = DB::table('transactions')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];
        return view('rate', $data);
    }

    public function rate(Request $request)
    {
        $request->validate([
            'rating_driver'=>'required|between:0,99.99'
        ]);

        $updating2 = DB::table('transactions')
                        ->where('id', $request->input('cid'))
                        ->update([
                            'rating_driver'=>$request->input('rating_driver'),
                        ]);
        $name = DB::table('transactions')->select('id','driver')->where('id', $request->input('cid'))->pluck('driver'); //pluck digunakan untuk mengambil nilai dari colom driver
        //dd($name);
        $rate = DB::table('pengemudis')->select('rating')->where('name', $name)->value('rating');
        //$rate = (string) $rate;
        //$rate = floatval($rate);
        //dd($rate);
        //dd($request->input('rating_driver'));
        $rerata = ($rate+$request->input('rating_driver'))/2;
        
        $updating3 = DB::table('pengemudis')->select('driver')->where('name', $name)->update(['rating'=> round($rerata,1)]);
        return redirect('user/home'); 
    }

    function getAll(){
        $data = array(
            'list'=>DB::table('transactions')->get()
        );
        return view('allTransaksi',$data);
    }

    function tambahBukti($id){
        $row = DB::table('transactions')
                ->where('id',$id)
                ->first();
        $data = [
            'Info' => $row,
        ];
        return view('upload', $data);
    }

    function bayar(Request $request){
        $request->validate([
            'bukti_bayar'=> 'required||image|mimes:jpg,jpeg,png|max:1999',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $name8 = "bukti_bayar".'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage\transaksi');
            $image->move($destinationPath, $name8);
            }

        $updating = DB::table('transactions')
                        ->where('id', $request->input('cid'))
                        ->update([
                            'bukti_bayar'=>$name8,
                        ]);
        return redirect('user/home');
    }
    //public function index()
    //{
    //    $userId = Auth::id();
    //    $row = DB::table('cars')->select('id','name','plat','harga')
    //            ->where('id',$Id)
    //            ->first();
    //    $row2 = DB::table('users')->select('id','name')
    //            ->where('id',$userId)
    //            ->first();
    //    $row3 = DB::table('pengemudis')->select('id','name','no_telp','harga_sewa')
    //            ->where('status','Available')
    //            ->first();
    //    $data = [
    //        'Info' => $row,
    //        'Info2' => $row2,
    //        'Info3' => $row3,
    //        'Info4' => $row3->harga_sewa+$row->harga,
    //    ];
    //    return view("book");
    //}
}
