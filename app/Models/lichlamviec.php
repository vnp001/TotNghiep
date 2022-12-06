<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\models\phongban;
use App\Models\nhanvien;
class lichlamviec extends Model
{
    protected $table='lichlamviec';
    protected $fillable=['ChuDe','Id_PhongBan','ThanhPhan','DiaDiem','NguoiChuTri','Ngay','ThoiGian','NoiDung','TinhTrang'];
    public $timestamps = false;
    public function phongban()
    {
        return $this->beLongsto(phongban::class,'Id_Phongban','Id_Phongban');
    }
    public function nguoichutri()
    {
        return $this->beLongsto(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
}
