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
        
    ];
}