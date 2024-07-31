<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    public $timestamps = false;

    protected $table = 'snack';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Kentang_Goreng',
        'Pisang_Nugget',
        'Pentol',
        'Nugget',
        'Sosis',
        'Tahu_Walik',
        'Roti_Bakar',
        'Cireng',
        'Tahu_Bakso',
        'Tempura',
        'Pisang_Goreng_Ori',
        'Telur',
            'Keju'
    ];
}
