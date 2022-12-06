<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\daotao;

class loaidaotao extends Model
{
    protected $table='loaidaotao';
    protected $fillable=['Id_LoaiDaoTao','TenLoaiDaoTao'];
    public $timestamps = false;

    public function daotao()
    {
        return $this->hasMany(daotao::class);
    }
}
