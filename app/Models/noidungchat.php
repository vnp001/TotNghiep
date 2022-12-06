<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\chatbox;
use App\Models\nhanvien;

class noidungchat extends Model
{
    protected $table='noidungchat';
    protected $fillable=['Id','Id_ChatBox','Id_NhanVien','NoiDung','ThoiGian'];
    public $timestamps = false;
    
    public function chatbox()
    {
        return $this->beLongsTo(chatbox::class,'Id_ChatBox','Id_ChatBox');
    }
    public function nhanvien()
    {
        return $this->beLongsTo(nhanvien::class,'Id_NhanVien','Id_NhanVien');
    }
}
