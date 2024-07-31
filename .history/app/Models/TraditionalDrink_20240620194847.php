<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraditionalDrink extends Model
{
    public $timestamps = false;

    protected $table = 'traditionaldrink';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Jahe',
        'Jahe_Susu',
        'Jahe_Gula_Aren',
        'STMJ',
        'Bramasta',
        'Wedang_Uwuh',
        'Jeruk_Anget'
    ];
}
