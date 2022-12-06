<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;
class kyluat extends Model
{
    protected $table='kyluat';
    protected $fillable=['Id_KyLuat','Id_NhanVien','Ngay','MoTa','Phat'];
    public $timestamps = false;
   
    public function nhanvien()
    {
        return $this->beLongsto(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
}
