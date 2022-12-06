<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;
use App\Models\loaiyeucau;

class yeucau extends Model
{
    protected $table='yeucau';
    // public $rowchucvu='';
    public $primaryId='Id_YeuCau';
    protected $fillable=['Id_YeuCau','Id_NhanVien','Id_LoaiYeuCau','Ngay','MoTa'];
    public $timestamps = false;

    public function nhanvien()
    {
        return $this ->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
    
    public function loaiyeucau()
    {
        return $this ->beLongsTo(loaiyeucau::class,'Id_LoaiYeuCau','Id_LoaiYeuCau');
    }
}
