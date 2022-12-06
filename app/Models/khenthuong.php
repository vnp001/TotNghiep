<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class khenthuong extends Model
{
    protected $table='khenthuong';
    protected $fillable=['Id_Khenthuong','Id_NhanVien','Ngay','MoTa','Thuong'];
    public $timestamps = false;
   
    public function nhanvien()
    {
        return $this->beLongsto(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
}
