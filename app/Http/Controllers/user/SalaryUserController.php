<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\bac;
use App\Models\ngach;
use App\Models\luong;

class SalaryUserController extends Controller
{
    public function index()
    {
        $dateNow=Carbon::now()->format('Y-m-d');
        $salarys=luong::where('Id_NhanVien','=',session()->get('user_id'))
                        ->with('nhanvien')
                        ->with('bacluong')
                        ->get();
        foreach($salarys as $salary)
        {
            $dateSalary = Carbon::parse($salary->Ngay);
            $endOfMonth = $dateSalary->endOfMonth()->format("Y-m-d");
            if($dateNow >= $endOfMonth)
            {
                if($salary->TinhTrang == 0)
                {
                    luong::where('Id_Luong','=',$salary->Id_Luong)
                    ->update([
                        // hiển thị lương theo cuối tháng
                        'TinhTrang'=> 1
                    ]);
                    // tình trạng :
                    // 0: không hiển thị lương
                    // 1: hiển thị lương
                }
            }
        }
        return view('user.salary.index',compact('salarys'));
    }
}
