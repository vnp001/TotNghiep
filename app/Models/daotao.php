<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\loaidaotao;
use App\Models\ketquadaotao;

class daotao extends Model
{
    protected $table='daotao';
    protected $fillable=['Id_LoaiDaoTao','TenDaoTao','NgayBatDau','NgayKetThuc','ChiPhi','NoiDung','NoiDaoTao','TinhTrang'];
    public $timestamps = false;

    public function loaidaotao()
    {
        return $this->beLongsTo(loaidaotao::class,'Id_LoaiDaoTao','Id_LoaiDaoTao');
    }
    public function ketquadaotao()
    {
        return $this->hasMany(ketquadaotao::class);
        
    }
}
