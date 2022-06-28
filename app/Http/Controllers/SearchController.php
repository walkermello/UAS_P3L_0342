<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request){
        
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $karyawans = DB::table('karyawans')->where('name','LIKE','%'.$search_text.'%')->paginate(2);
            return view('search',['karyawans'=>$karyawans]);
        }
        else{
            return view('search');
        }
    }

    function find(Request $request){
        
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $pengemudis = DB::table('pengemudis')->where('name','LIKE','%'.$search_text.'%')->paginate(2);
            return view('find',['pengemudis'=>$pengemudis]);
        }
        else{
            return view('find');
        }
    }

    function cari(Request $request){
        
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $promos = DB::table('promos')->where('kode','LIKE','%'.$search_text.'%')->paginate(2);
            return view('cari',['promos'=>$promos]);
        }
        else{
            return view('cari');
        }
    }

    function temukan(Request $request){
        
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $cars = DB::table('cars')->where('name','LIKE','%'.$search_text.'%')->paginate(2);
            return view('searchAset',['cars'=>$cars]);
        }
        else{
            return view('searchAset');
        }
    }

    function dapatkan(Request $request){
        
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $jadwals = DB::table('jadwals')->where('hari_kerja','LIKE','%'.$search_text.'%')->paginate(2);
            return view('searchJadwal',['jadwals'=>$jadwals]);
        }
        else{
            return view('searchJadwal');
        }
    }
}
