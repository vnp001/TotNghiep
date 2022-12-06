<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class phanquyen extends Model
{
    
    protected $fillable=['Id_PhanQuyen','TenQuyen'];

    protected $table='phanquyen';

    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
