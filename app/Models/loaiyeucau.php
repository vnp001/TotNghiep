<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\yeucau;

class loaiyeucau extends Model
{
    protected $table='loaiyeucau';
    protected $fillable=['Id_LoaiYeuCau','TenLoaiYeuCau'];
    
    public $timestamps = false;

    public function yeucau()
    {
        return $this->hasMany(yeucau::class);
    }
}
