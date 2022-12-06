<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chamcong;

use Carbon\Carbon;

class AttendanceController extends Controller
{
    // public function attendance()
    // {
    //     $attendanceUser=new chamcong();
    //     $attendanceUser->Id_NhanVien = session()->get('user_id');
    //     $attendanceUser->Ngay= Carbon::now()->format('Y-d-m');
    //     $attendanceUser->GioVao=Carbon::now()->format('07:00:00');
    //     $attendanceUser->GioRa=Carbon::now()->format('17:00:00');
    //     $attendanceUser->GioTangCa=Carbon::now()->format('00:00:00');;
    //     $attendanceUser->GioBS=Carbon::now()->format('00:00:00');;
        
    //    $attendanceUser -> save();
    //    return back()->with('attendance');
    // }
    public function check()
    {
        // echo session()->get('user_id');
        $user=chamcong::where('Id_NhanVien',session()->get('user_id'))
                        ->where('Ngay',Carbon::now()->format('2022-04-07'));
        foreach($user as $u)
        {
            echo $u->Ngay;
        }
    }
}
