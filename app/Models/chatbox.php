<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\noidungchat;
use App\Models\nhanvien;
class chatbox extends Model
{
    protected $table='chatbox';
    protected $fillable=['Id_ChatBox','NguoiTao','ToUser','Id_PhongBan','TenChatBox','HinhAnh','ThoiGian'];
    public $timestamps = false;
    
    public function noidungchat()
    {
        return $this->hasMany(noidungchat::class);
    }
    public function nhanvien()
    {
        return $this->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
    public function touser()
    {
        return $this->beLongsTo(nhanvien::class,'ToUser','Id_NhanVien');
    }
}
