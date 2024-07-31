<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonCoffee extends Model
{
    public $timestamps = false;

    protected $table = 'Noncoffee';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Strawberry_Milkshake',
        'Chocolate_Milkshake',
        'Vanilla_Milkshake',
        'Avocado_Durian',
        'Soda_Gembira',
        'Es_Milo_Susu',
        'Extrajoss_Susu',
        'Es_Susu',
        'Es_Milo',
        'Ice_Greentea',
        'Ice_Red_Velvet',
        'Ice_Chocolate',
        'Ice_Thai_Tea',
        'Kombucha',
        'Ice_Taro',
        'Ice_Tea',
        'STMJ',
        'Jahe',
        'Jahe_Susu',
        'Jahe_Gula_Aren',
        'Wedang_Uwuh',
        'Milo',
        'Teh_Panas',
        'Lemontea',
        'Greentea',
        'RedVelvet',
        'Chocolate',
        'Thai_Tea',
        'Taro',
        'Jeruk_Hangat',
        'Susu_Milo',
        'Susu_Putih'
    ];
}
