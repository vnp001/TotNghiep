<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loaitrinhdo extends Model
{
    protected $table='loaitrinhdo';

    protected $fillable=['Id_LoaiTrinhDo','TenLoaiTrinhDo'];

    public $timestamps = false;
}
