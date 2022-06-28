<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Transaction extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id_karyawan',
        'id_customer',
        'id_driver',
        'id_aset',
        'tgl_transaksi',
        'tgl_mulai',
        'tgl_selesai',
        'rating_driver',
        'tgl_pengembalian',
        'status',
        'komentar',
        'rating_rental',
        'komentar_rental',
        'jenis_transaksi',
        'metode_pembayaran',
        'sub_total',
        'denda',
        'id_promo',
        'diskon',
        'total',
    ];
}
