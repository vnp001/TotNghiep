<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;


class chinhtri extends Model
{
    protected $table='trinhdochinhtri';
    protected $fillable=['Id_ChinhTri','TrinhDo'];
    public $timestamps = false;
    
    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }

}
