<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\danhgia;
use App\Models\luong;
use App\Models\bac;

class luong extends Model
{
    protected $table='luong';
    // protected $fillable=['Id_Luong','Id_NhanVien','LuongCoBan','HeSoLuong','LuongLamThem','TienKTKL','TongLuong'];
    protected $fillable=['Id_Luong','Id_NhanVien','Ngay','TongNgayLam','Id_Bac','TongLuong','TinhTrang'];
    
    public $timestamps = false;
   
    public function nhanvien()
    {
        return $this->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
    public function bacluong()
    {
        return $this->beLongsTo(bac::class,'Id_Bac','Id');
    }
   
}
