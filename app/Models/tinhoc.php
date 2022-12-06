<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class tinhoc extends Model
{
    protected $table='trinhdotinhoc';
    public $timestamps = false;
    protected $fillable=['Id_TinHoc','TrinhDo'];
    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
