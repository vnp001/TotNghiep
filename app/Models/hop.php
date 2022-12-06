<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hop extends Model
{
    protected $table='hop';
    protected $fillable=['Id','Id_PhongBan','ThanhPhan','DiaDiem','NguoiChuTri','Ngay','File','ThoiGian','NoiDung','TinhTrang'];
    public $timestamps = false;
    public function phongban()
    {
        return $this->beLongsto(phongban::class,'Id_PhongBan','Id_PhongBan');
    }
    public function nguoichutri()
    {
        return $this->beLongsto(nhanvien::class,'NguoiChuTri','Id_NhanVien');
    }
}
