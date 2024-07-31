<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;

    protected $table = 'food';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Nasi_Telur_Mata_Sapi',
        'Nasi_Telur_Normal',
        'Nasi_Telur_Kecap',
        'Nasi_Telur_Pedas',
        'Nasi_Telur_Bawang',
        'Nasi_Telur_Saus',
        'Nasi_Telur_Keju',
        'Nasi_Indomie',
        'Nasi_Omelette',
        'Indomie_Goreng',
        'Indomie_Goreng_Double',
        'Indomie_Kuah'
    ];
}
