<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\congviec;
use App\Models\hop;
use App\Models\thongbao;

class phongban extends Model
{
    protected $table='phongban';
    protected $fillable=['Id_PhongBan','TenPhongBan','NguoiQuanLy'];
    public $timestamps = false;
    
    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
    public function truongphong()
    {
        return $this->beLongsTo(nhanvien::class,'NguoiQuanLy','Id_NhanVien');  
    }
    
    public function congviec()
    {
        return $this->hasMany(congviec::class);  
    }
    public function hop()
    {
        return $this->hasMany(hop::class);  
    }
    public function thongbao()
    {
        return $this->hasMany(thongbao::class);  
    }
}
