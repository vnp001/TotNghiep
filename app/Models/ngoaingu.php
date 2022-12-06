<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;

class ngoaingu extends Model
{
    protected $table='trinhdongoaingu';
    protected $fillable=['Id_NgoaiNgu','TrinhDo'];
    
    public $timestamps = false;
   
    public function nhanvien()
    {
        return $this->hasMany(nhanvien::class);  
    }
}
