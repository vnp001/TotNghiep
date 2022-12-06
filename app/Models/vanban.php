<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;
use App\Models\loaivanban;

class vanban extends Model
{
    protected $table='vanban';
    // public $rowchucvu='';
    public $primaryId='Id_VanBan';
    protected $fillable=['Id_VanBan','Id_NhanVien','Id_LoaiVanBan','soVB','TenVanBan','NoiDung','HinhAnh'];
    public $timestamps = false;

    public function nhanvien()
    {
        return $this ->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
    
    public function loaivanban()
    {
        return $this ->beLongsTo(loaivanban::class,'Id_LoaiVanBan','Id_LoaiVanBan');
    }
}
