<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Car extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'no_ktp',
            'name',
            'type',
            'transmisi',
            'gas',
            'color',
            'capacity',
            'facility',
            'plat',
            'stnk',
            'kategori',
            'kontrak_mulai',
            'kontrak_selesai',
            'service',
            'bagasi',
            'harga',
            'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
