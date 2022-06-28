<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $row = DB::table('transactions')->where('id',$id)->first();
        
        $data = [
            'Info' => $row,
            'date'=> date('d/m/y') 
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('Nota Pembayaran.pdf');
    }
}
