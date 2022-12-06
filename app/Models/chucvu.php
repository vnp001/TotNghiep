<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nhanvien;
use App\Models\bac;

class chucvu extends Model
{
    protected $table='chucvu';
    public $timestamps = false;
    protected $fillable=['Id_ChucVu','TenChucVu','HeSoPhuCap'];

    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
    public function bac()
    {
        return $this->hasMany(bac::class);  
    }
}
