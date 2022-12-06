<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class bomon extends Model
{

    public $timestamps = false;

    protected $table='bomon';
    protected $fillable=['Id_BoMon','TenBoMon'];

    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
