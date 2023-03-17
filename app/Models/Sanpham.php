<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $fillable =[
        'ten_sp',
        'gia_sp',
        'ma_nsx',
        'hinh_anh',
    ];
}
