<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhasanxuat extends Model
{
    use HasFactory;
    protected $fillable =[
        'ma_nsx',
        'ten_nsx',
        'tru_so',
    ];
}

