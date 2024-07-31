<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModernDrink extends Model
{
    public $timestamps = false;

    protected $table = 'moderndrink';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Hot_Greentea',
        'Hot_RedVelvet',
        'Hot_Chocolate',
        'Hot_Thaitea',
        'Hot_Taro',
        'Hot_Cappucino',
        'Ice_Greentea',
        'Ice_RedVelvet',
        'Ice_Chocolate',
        'Ice_Thaitea',
        'Ice_Vanilla_Latte',
        'Ice_Taro',
        'Ice_Cappucino',
        'Ice_Thai_Tea'
    ];
}
