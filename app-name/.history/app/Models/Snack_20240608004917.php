<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    public $timestamps = false;

    protected $table = 'Snack';

    protected $primaryKey = 'ID';

    protected $fillable = [
        
    ];
}
