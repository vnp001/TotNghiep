<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\chucvu;
use App\Models\phongban;
use App\Models\ngoaingu;
use App\Models\tinhoc;
use App\Models\chinhtri;
use App\Models\tdchuyenmon;
use App\Models\phanquyen;
use App\Models\chuyenmon;
use App\Models\bomon;
use App\Models\donvi;
use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\lichlamviec;
use App\Models\chamcong;
use App\Models\luong;
use App\Models\yeucau;
use App\Models\tailieu;
use App\Models\danhgia;
use App\Models\congviec;
use App\Models\noidungchat;
use App\Models\chatbox;
use App\Models\hop;
use App\Models\thongbao;




class nhanvien extends Model
{
    protected $table='nhanvien';
    public $timestamps = false;
    protected $fillable=['Id_NhanVien','Id_ChucVu','Id_NgoaiNgu','Id_PhongBan','Id_TinHoc','Id_ChinhTri','Id_TDChuyenMon','Id_PhanQuyen','Id_ChuyenMon','Id_BoMon','Id_DonVi','Id_Khenthuong'
    ,'Ho','Ten','NgaySinh','GioiTinh','CMND','DanToc','SDT','DiaChi','NoiSinh','QueQuan',
    'DaVaoDang','BienChe','BatDauCongTac','NgayVaoTruong','Email','HinhAnh','TenTK','MatKhau','TinhTrang'];
    
    public function chucvu()
    {
        return $this->beLongsTo(chucvu::class,'Id_ChucVu','Id_ChucVu');  
    }
    public function phongban()
    {
        return $this->beLongsTo(phongban::class,'Id_PhongBan','Id_PhongBan');
    }
    public function ngoaingu()
    {
        return $this->beLongsTo(ngoaingu::class,'Id_NgoaiNgu','Id_NgoaiNgu');
        
    }
    public function tinhoc()
    {
        return $this->beLongsTo(tinhoc::class,'Id_TinHoc','Id_TinHoc');
        
    }   
    public function chinhtri()
    {
        return $this->beLongsTo(chinhtri::class,'Id_ChinhTri','Id_ChinhTri');
        
    }
    public function trinhdochuyenmon()
    {
        return $this->beLongsTo(tdchuyenmon::class,'Id_TDChuyenMon','Id_TDChuyenMon');
        
    }
    public function phanquyen()
    {
        return $this->beLongsTo(phanquyen::class,'Id_PhanQuyen','Id_PhanQuyen');
    }
    public function chuyenmon()
    {
        return $this->beLongsTo(chuyenmon::class,'Id_ChuyenMon','Id_ChuyenMon');
    }
    public function bomon()
    {
        return $this->beLongsTo(bomon::class,'Id_BoMon','Id_BoMon');
    }
    public function donvi()
    {
        return $this->beLongsTo(donvi::class,'Id_DonVi','Id_DonVi');
    }
    public function khenthuong()
    {
        return $this->hasMany(khenthuong::class);
    }
    public function kyluat()
    {
        return $this->hasMany(kyluat::class);
    }
    public function chamcong()
    {
        return $this->hasMany(chamcong::class);  
    }
    public function lichlamviec()
    {
        return $this->hasMany(lichlamviec::class);  
    }
    public function luong()
    {
        return $this->hasMany(luong::class);  
    }
    public function tailieu()
    {
        return $this->hasMany(tailieu::class);  
    }
    public function yeucau()
    {
        return $this->hasMany(yeucau::class);  
    }
    public function danhgia()
    {
        return $this->hasMany(danhgia::class);  
    }
    
    public function congviec()
    {
        return $this->hasMany(congviec::class);  
    }
    public function chatbox()
    {
        return $this->hasMany(chatbox::class);  
    }
    
    public function noidungchat()
    {
        return $this->hasMany(noidungchat::class);  
    }
    public function hop()
    {
        return $this->hasMany(hop::class);  
    }
    public function thongbao()
    {
        return $this->hasMany(thongbao::class);  
    }
    public function phongbanTP()
    {
        return $this->hasMany(phongban::class);  
    }
    public function nguoigiao()
    {
        return $this->hasMany(congviec::class);  
    }
    public function nguoinhan()
    {
        return $this->hasMany(thongbao::class);  
    }
    public function nguoigui()
    {
        return $this->hasMany(thongbao::class);  
    }
    public function touser()
    {
        return $this->hasMany(chatbox::class);  
    }
}
