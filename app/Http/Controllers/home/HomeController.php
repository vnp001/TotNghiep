<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\congviec;
use App\Models\lichlamviec;
use App\Models\chamcong;
use App\Models\hop;
use App\Models\vanban;



class HomeController extends Controller
{
    public function homeadmin()
    {
        $dateNow= Carbon::now()->format('Y-m-d');
        $deadTime= Carbon::now()->format('Y-m-d h:m:s');
        $employees=nhanvien::all();
        $departments=phongban::all();
        $meettings=hop::with('phongban')
                      ->with('nguoichutri')
                      ->orderBy('Id', 'DESC')
                      ->get();
        $works=congviec::with('nhanvien')
                        ->with('phongban')
                        // ->orderBy('Id_CongViec', 'DESC')
                        ->orderBy('TinhTrang','ASC')
                        ->get();
        foreach($works as $work)
        {
            $getDate= Carbon::parse($work->ThoiGianKT)->format('Y-m-d h:m:s');
            if($getDate < $deadTime )
            {
              if($work->TinhTrang == 1)
              {
                congviec::where('Id_CongViec','=',$work->Id_CongViec)
                  ->update([
                     'TinhTrang'=>3
                  ]);
              }
            }
        }
        $UpdateStateAdmin=nhanvien::where(['Id_NhanVien'=> session()->get('admin_id')])->update([
            'TrangThai' => 1 
          ]);
        $getMeettings=hop::where('TinhTrang','=',0)
                        ->where('Ngay','=',$dateNow)
                        ->get();
        foreach($getMeettings as $getMeetting)
        {
            if($getMeetting->Ngay < $dateNow)
            {
              hop::findOrFail($getMeetting->Id)
              ->update([
                'TinhTrang'=>1
              ]);
            }
        }

        return view('admin.home.index',compact('dateNow','meettings','works','employees','departments'))->with('homeadmin','chào ');
        
    }
    public function homeuser()
    {
      $deadTime= Carbon::now()->format('Y-m-d h:m:s');
      $dateNow=Carbon::now()->format('Y-m-d');
      $employees=nhanvien::where(['Id_NhanVien'=> session()->get('user_id')])->get();
      $employeeOfDerpartment=phongban::where('NguoiQuanLy','=',session()->get('user_id'))
                            ->get();
      
      foreach($employees as $employee)
      {
          $calendarWork=congviec::where('TinhTrang','=',1)
                                ->Where('Id_NhanVien','=',$employee->Id_NhanVien)
                                ->orWhere('Id_PhongBan','='.$employee->Id_PhongBan)
                                ->with('nguoigiao')
                                ->get();
          foreach($calendarWork as $work)
          {
            $getDate= Carbon::parse($work->ThoiGianKT)->format('Y-m-d h:m:s');
              if($getDate < $deadTime )
              {
                  congviec::where('Id_CongViec','=',$work->Id_CongViec)
                    ->update([
                      'TinhTrang'=>3
                    ]);
              }
          }
          // $meettings=hop::where('Ngay','=',$dateNow)
          //                 ->where('Id_PhongBan','=',$employee->Id_PhongBan)
          //                 ->get();
      }
      // $calendarWork=congviec::where('TinhTrang','=',1)
      //                           ->Where('Id_NhanVien','=',$employee->Id_NhanVien)
      //                           ->orWhere('Id_PhongBan','='.$employee->Id_PhongBan)
      //                           ->get();
      // dd($meettings);
      $allMettings=hop::where('Ngay','=',$dateNow)
                      ->orderBy('ThoiGian', 'ASC')
                      ->get();
      $documents=vanban::skip(0)
                      ->take(3)
                      // ->orderBy('Id_VanBan','desc')
                      ->orderBy('Ngay','desc')
                      ->get();
      // $works=congviec::where('Id_NhanVien')
      $UpdateStateUser=nhanvien::where(['Id_NhanVien'=> session()->get('user_id')])->update([
          'TrangThai' => 1 
        ]);
      return view('user.home.index',compact('dateNow','documents','employeeOfDerpartment','employees','allMettings','UpdateStateUser','calendarWork'));
    }
}
