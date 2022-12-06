<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class chuyenmon extends Model
{
    protected $table='chuyenmon';
   
    public $timestamps = false;
   
    protected $fillable=['Id_ChuyenMon','TenChuyenMon'];

    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
