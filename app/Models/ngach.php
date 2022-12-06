<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\bac;

class ngach extends Model
{
    
    public $timestamps = false;

    protected $table='ngach';
    protected $fillable=['Id','MaNgach','Ngach','MoTa'];

    public function bac()
    {
        return $this->hasMany(bac::class);  
    }
}
