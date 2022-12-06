<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;

use DB;

use App\Models\chamcong;
use App\Models\nhanvien;
use App\Models\luong;



class TimekeepingCotroller extends Controller
{
    public function index()
    {
        $now = Carbon::now();
      
        $nowYear = \Carbon\Carbon::now();
        $year=\Carbon\Carbon::parse($nowYear)->format('Y');

      
        $employees=nhanvien::all();
        $firstDateOfMonth=$now->format('Monday m-Y');
        $firstOfMonth = $now->firstOfMonth()->format("Y-m-d");
        $endOfMonth = $now->endOfMonth()->format("Y-m-d");
        $dateNow=\Carbon\Carbon::parse(Carbon::now())->format('d-m-Y');
        $search=0;
         return view('admin.timekeeping.index',compact('search','firstOfMonth','dateNow','endOfMonth','employees'));
    }
    public function store(request $request)
    {     
        $dateNow = Carbon::parse(Carbon::now())->format('Y-m-d');
        $firstOfMonth = Carbon::now()->firstOfMonth()->format("Y-m-d");
        $endOfMonth = Carbon::now()->endOfMonth()->format("Y-m-d");

        $checkTimeKeeping=chamcong::where('Id_NhanVien','=',$request->nhanvien)
                                ->where('Ngay','=',$request->ngay)
                                ->get();
        $timeKeeping=new chamcong;

        if($request->checkvang == true)
        {
            $timeKeeping->Id_NhanVien=$request->nhanvien;
            $timeKeeping->Ngay=$request->ngay;
            $timeKeeping->GioVao=new Carbon('00:00:00');
            $timeKeeping->GioRa=new Carbon('00:00:00');
            $timeKeeping->GioTangCa=new Carbon('00:00:00');
            $timeKeeping->GioBS=new Carbon('00:00:00');
        }
        else
        {

            $request->validate([
                'giovao' => ['required'],
                'giora'=> ['required'],
            ]);
            $tangca=$request->tonggiolamthem;
            $boxung=$request->giolamboxung;
            if($tangca == null)
            {
                $tangca=\Carbon\Carbon::parse('00:00:00');
            }
            if($boxung == null)
            {
                $boxung=\Carbon\Carbon::parse('00:00:00');
            }
            $timeKeeping->Id_NhanVien=$request->nhanvien;
            $timeKeeping->Ngay=$request->ngay;
            $timeKeeping->GioVao=$request->giovao;
            $timeKeeping->GioRa=$request->giora;
            $timeKeeping->GioTangCa= $tangca;
            $timeKeeping->GioBS= $boxung;
        }
        // dd($checkTimeKeeping);
        if(!empty($checkTimeKeeping[0]->Id_ChamCong))
        {
            return back()->with('error','Nhân viên này đã chấm công rồi');
           
        }
      
            if($timeKeeping->save())
            {
                $date=new Carbon($request->ngay);
                $datenow = Carbon::now();
                $firstOfMonthdatenow = $datenow->firstOfMonth()->format("Y-m-d");

                $firstOfMonth = $date->firstOfMonth()->format("Y-m-d");
                $endOfMonth = $date->endOfMonth()->format("Y-m-d");
                $getLevel=luong::where('Id_NhanVien','=',$request->nhanvien)
                                ->orderBy('Id_Luong', 'DESC')
                                ->get();
                $totalLaudary=DB::select("SELECT  SUM(Thuong) AS Thuong FROM khenthuong WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$request->nhanvien."'");
                $totalDiscipline=DB::select("SELECT  SUM(Phat) AS Phat FROM kyluat WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$request->nhanvien."'");
                $checkSalary=luong::where('Id_NhanVien','=',$request->nhanvien)
                                ->where('Ngay','=',$firstOfMonth)
                                ->where('Ngay','=',$endOfMonth)
                                ->get();
                                // dd($checkSalary);
            // if(empty($checkSalary[0]->Id_Luong))
            if(empty($checkSalary))
            {
                // if($firstOfMonthdatenow == Carbon::parse($datenow)->format("Y-m-d"))
                // {
                    $salary=new luong();
                    $salary->Id_NhanVien=$request->nhanvien;
                    $salary->Id_Bac=$getLevel[0]->Id_Bac;
                    $salary->Ngay=$datenow;
                    $salary->TongNgayLam=0;
                    $salary->TongLuong=0;
                    $salary->TinhTrang=0;
                    $salary->save();
                // }
            }
            $getSumDate=chamcong::where('Id_NhanVien','=',$request->nhanvien)
                                ->where('Ngay','>=',$firstOfMonth)
                                ->where('Ngay','<=',$endOfMonth)
                                ->where('GioVao','>=','07::00::00')
                                ->count();
                                // ->get();
            $getSalaryDate=luong::where('Id_NhanVien','=',$request->nhanvien)
                                    ->with('bacluong')
                                    ->where('Ngay','>=',$firstOfMonth)
                                    ->where('Ngay','<=',$endOfMonth)
                                    ->get();
            $getHeSoPhuCap=nhanvien::where('Id_NhanVien','=',$request->nhanvien)
                                    ->with('chucvu')
                                    ->get();
            // dd($request->nhanvien);  
            // dd($getSalaryDate);
            // foreach($getSalaryDate as $get)
            // {
            //     dd($get->bacluong->HeSoLuong);
            // }
            // $totalLaudaryDiscipline=round($totalLaudary[0]->Thuong - $totalDiscipline[0]->Phat);  

            $totalSalary= round((($getSalaryDate[0]->bacluong->HeSoLuong * $getSalaryDate[0]->bacluong->LuongCoBan
            * $getHeSoPhuCap[0]->chucvu->HeSoPhuCap)/28 * $getSumDate + $totalLaudary[0]->Thuong - $totalDiscipline[0]->Phat));
            
            // // dd($getSumDate);
            $totalDate=luong::where('Id_Luong','=',$getSalaryDate[0]->Id_Luong)
                        ->update([
                            'TongNgayLam'=>$getSumDate,
                            'TongLuong'=>$totalSalary
                        ]);
            // dd($getSalaryDate[0]->Id_Luong);    
            // dd($getSumDate);
        // dd($totalSalary);
        // echo 'tong ngay'.$getSumDate.'Tong luong'.$totalSalary;

            return back()->with('success','Chấm công nhân viên thành công'); 
        }  
        else
        {
            return back()->with('error','Chấm công nhân viên thất bại');
        } 
    }
    public function update($id,request $request)
    {
        // echo $request->giovaoUD;
        // echo $request->gioraUD;
        // echo $request->giotangcaUD;
        // echo $request->giobsUD;

        if($request->checkbstc == true)
        {
            $timeKeeping=chamcong::where('Id_ChamCong','=',$id)
            ->update([
                'GioVao'=>\Carbon\Carbon::parse('00:00:00'),
                'GioRa'=>\Carbon\Carbon::parse('00:00:00'),
                'GioTangCa'=>\Carbon\Carbon::parse('00:00:00'),
                'GioBS'=>\Carbon\Carbon::parse('00:00:00')
            ]);
        }
        else
        {
            $tangca=$request->giotangcaUD;
            $boxung=$request->giobsUD;
            if($tangca == null)
            {
                $tangca=\Carbon\Carbon::parse('00:00:00');
            }
            if($boxung == null)
            {
                $boxung=\Carbon\Carbon::parse('00:00:00');
            }
            $timeKeeping=chamcong::where('Id_ChamCong','=',$id)
                        ->update([
                            'GioVao'=>$request->giovaoUD,
                            'GioRa'=>$request->gioraUD,
                            'GioTangCa'=>$tangca,
                            'GioBS'=>$boxung
                        ]);
        }
            // dd('true');

        if($timeKeeping)
        {

            $date=new Carbon($request->ngay);
            $datenow = Carbon::now();
            $firstOfMonthdatenow = $datenow->firstOfMonth()->format("Y-m-d");

            $firstOfMonth = $date->firstOfMonth()->format("Y-m-d");
            $endOfMonth = $date->endOfMonth()->format("Y-m-d");
            $getLevel=luong::where('Id_NhanVien','=',$request->nhanvien)
                            ->orderBy('Id_Luong', 'DESC')
                            ->first();
                            // ->get();
            $totalLaudary=DB::select("SELECT  SUM(Thuong) AS Thuong FROM khenthuong WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$request->nhanvien."'");
            $totalDiscipline=DB::select("SELECT  SUM(Phat) AS Phat FROM kyluat WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$request->nhanvien."'");
            $checkSalary=luong::where('Id_NhanVien','=',$request->nhanvien)
                        ->where('Ngay','=',$firstOfMonth)
                        ->where('Ngay','=',$endOfMonth)
                        ->get();

        if($checkSalary == null)
        {
            // if($firstOfMonthdatenow == Carbon::parse($datenow)->format("Y-m-d"))
            // {
                $salary=new luong();
                $salary->Id_NhanVien=$request->nhanvien;
                $salary->Id_Bac=$getLevel[0]->Id_Bac;
                $salary->Ngay=$datenow;
                $salary->TongNgayLam=0;
                $salary->TongLuong=0;
                $salary->TinhTrang=0;
                $salary->save();
            // }
        }
        $getSumDate=chamcong::where('Id_NhanVien','=',$request->nhanvien)
                            ->where('Ngay','>=',$firstOfMonth)
                            ->where('Ngay','<=',$endOfMonth)
                            ->where('GioVao','>=','07::00::00')
                            ->count();
                            // ->get();
        $getSalaryDate=luong::where('Id_NhanVien','=',$request->nhanvien)
                                ->with('bacluong')
                                ->where('Ngay','>=',$firstOfMonth)
                                ->where('Ngay','<=',$endOfMonth)
                                ->get();
        $getHeSoPhuCap=nhanvien::where('Id_NhanVien','=',$request->nhanvien)
                                ->with('chucvu')
                                ->first()
                                ->get();
        $totalLaudaryDiscipline=round($totalLaudary[0]->Thuong - $totalDiscipline[0]->Phat);  

        $totalSalary= round((($getSalaryDate[0]->bacluong->HeSoLuong * $getSalaryDate[0]->bacluong->LuongCoBan
        * $getHeSoPhuCap[0]->chucvu->HeSoPhuCap)/28 * $getSumDate + $totalLaudary[0]->Thuong - $totalDiscipline[0]->Phat));

        $totalDate=luong::where('Id_Luong','=',$getSalaryDate[0]->Id_Luong)
                    ->update([
                        'TongNgayLam'=>$getSumDate,
                        'TongLuong'=>$totalSalary
                    ]);      
            return back()->with('success','Cập nhập thành công'); 
        }  
        else
        {
            return back()->with('error','Cập nhập thất bại');
        }
    }
    public function Search(request $request)
    {
        $yearsearch=$request->nam;
        $monthsearch=$request->thang;
        $date= new Carbon($request->nam.'-'.$request->thang.'-'.'01');
        $employees=nhanvien::all();
        $firstOfMonth = $date->firstOfMonth()->format('Y-m-d');
        $endOfMonth = $date->endOfMonth()->format('Y-m-d');
        $search=1;
        return view('admin.timekeeping.index',compact('search','monthsearch','yearsearch','firstOfMonth','dateNow','endOfMonth','employees'));
    }
    public function delete($id,request $request)
    {
        $timeKeeping=chamcong::where('Id_ChamCong','=',$id);
        if($timeKeeping->delete())
        {
            return back()->with('success','Xóa thành công'); 
        }  
        else
        {
            return back()->with('error','Xóa thất bại');
        }
    }
   
}
