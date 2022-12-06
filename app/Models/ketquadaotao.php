<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\daotao;

class ketquadaotao extends Model
{
    protected $table='ketquadaotao';
    protected $fillable=['Id_KetQuaDT','Id_NhanVien','Id_DaoTao','KetQua','GhiChu'];
    public $timestamps = false;
   
    public function nhanvien()
    {
        return $this->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
    public function daotao()
    {
        return $this->beLongsTo(daotao::class,'Id_DaoTao','Id_DaoTao');
    }
}
