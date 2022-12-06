<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class chamcong extends Model
{
    protected $table='chamcong';
    protected $fillable=['Id_ChamCong','Id_NhanVien','Ngay','GioVao','GioRa','GioTangCa','GiBS'];
    public $timestamps = false;
    
    public function nhanvien()
    {
        return $this->beLongsto(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
}
