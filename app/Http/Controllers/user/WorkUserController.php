<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lichlamviec;
use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\phongban;
use App\Models\nhanvien;
use Carbon\Carbon;


class WorkUserController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $weekStartDate=new Carbon(now()->startOfWeek()->format('Y-m-d').'00:00:00');
        $weekEndDate=new Carbon(now()->endOfWeek()->format('Y-m-d').'00:00:00');
        $employees=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))
                        ->get();
        $employeeLaudatory=khenthuong::where('Ngay','>',$now->firstOfMonth()->format('Y-m-d'))
                                    ->where('Ngay','<=',$now->endOfMonth()->format('Y-m-d'))
                                    ->with('nhanvien')
                                    ->get();
        $employeeDiscipline=kyluat::where('Ngay','>',$now->firstOfMonth()->format('Y-m-d'))
                                    ->where('Ngay','<=',$now->endOfMonth()->format('Y-m-d'))
                                    ->with('nhanvien')
                                    ->get();
        return view('user.work.index',compact('weekStartDate','employees','weekEndDate','employeeLaudatory','employeeDiscipline'));
    }
   
}
