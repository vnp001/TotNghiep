<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class donvi extends Model
{
    protected $table='donvi';

    protected $fillable=['Id_DonVi','TenDonVi'];

    public $timestamps = false;

    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
