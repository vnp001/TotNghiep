<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class tailieu extends Model
{
    protected $table='tailieu';
    protected $fillable=['Id_TaiLieu','Id_NhanVien','Id_LoaiTaiLieu','TaiLieu','MoTa','ThoiGian'];
    public $timestamps = false;
    
    public function nhanvien()
    {
        return $this->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');  
    }
 
}
