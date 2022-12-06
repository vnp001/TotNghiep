<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\phongban;
use App\Models\nhanvien;
class congviec extends Model
{
    protected $table='congviec';
    protected $fillable=['Id_CongViec','MoTa','Id_NhanVien','NguoiGiao','Id_PhongBan','Ngay','ThoiGianBD','ThoiGianKT','NoiDung','File','TinhTrang','TienDo'];
    public $timestamps = false;
    
    public function nhanvien()
    {
        return $this->beLongsto(nhanvien::class,'Id_NhanVien','Id_NhanVien');

    }
    public function nguoigiao()
    {
        return $this->beLongsto(nhanvien::class,'NguoiGiao','Id_NhanVien');

    }
    public function phongban()
    {
        return $this->beLongsTo(phongban::class,'Id_PhongBan','Id_PhongBan');  
    }
}
