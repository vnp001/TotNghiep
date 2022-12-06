<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class tdchuyenmon extends Model
{
    protected $table='trinhdochuyenmon';
    public $timestamps = false;
    protected $fillable=['Id_TDChuyenMon','TrinhDo'];
    
    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
