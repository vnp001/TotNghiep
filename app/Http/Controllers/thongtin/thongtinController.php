<?php

namespace App\Http\Controllers\thongtin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nhanvien;
class thongtinController extends Controller
{
    public function getTen()
    {
        $user=nhanvien::where()->get();
    }
}
