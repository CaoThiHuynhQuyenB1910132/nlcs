<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_sp',
        'mo_ta',
        'hinh_anh',
        'gia',
        'so_luong',
        'id_danhmuc',
    ];

    public function getImageAtribute($hinh_anh)
    {
        return asset($hinh_anh);
    }

    public function danhmuc(){
        return $this->belongsTo(DanhMuc::class,'id_danhmuc');
    }
}
