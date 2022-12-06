<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\chucvu;
use App\Models\luong;
use App\Models\ngach;



class bac extends Model
{
    
    public $timestamps = false;

    protected $table='bac';
    protected $fillable=['Id','Id_Ngach','Id_ChucVu','TenBac','HeSoLuong','LuongCoBan'];

    public function ngach()
    {
        return $this->beLongsTo(ngach::class,'Id_Ngach','Id');  
    }
    public function chucvu()
    {
        return $this->beLongsTo(chucvu::class,'Id_ChucVu','Id_ChucVu');  
    }
    public function luong()
    {
        return $this->hasMany(luong::class);  
    }
    
}
