<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\phongban;

class thongbao extends Model
{
    protected $table='thongbao';
    protected $fillable=['Id','NguoiGui','NguoiNhan','PhongBan','Noidung','ThoiGian'];
    public $timestamps = false;

    public function nguoinhan()
    {
        return $this->beLongsTo(nhanvien::class,'NguoiNhan','Id_NhanVien');  
    
    }
    public function nguoigui()
    {
        return $this->beLongsTo(nhanvien::class,'NguoiGui','Id_NhanVien');  
        
    }
    public function phongban()
    {
        return $this->beLongsTo(phongban::class,'PhongBan','Id_PhongBan');  
        
    }
}
