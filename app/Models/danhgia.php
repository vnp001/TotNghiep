<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class danhgia extends Model
{
    protected $table='danhgia';
    protected $fillable=['Id_DanhGia','NhanVien','NguoiDanhGia','Ngay','NoiDung','HinhThuc','File'];
    public $timestamps = false;

    public function nhanvien()
    {
       return $this->beLongsTo(nhanvien::class,'NhanVien','Id_NhanVien');
    }
}
