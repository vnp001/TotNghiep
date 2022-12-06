<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\vanban;

class loaivanban extends Model
{
    protected $table='loaivanban';
    protected $fillable=['Id_LoaiVanBan','TenLoaiVanBan'];
    public $timestamps = false;
    
    public function vanban()
    {
        return $this->hasMany(vanban::class);
    }
}
