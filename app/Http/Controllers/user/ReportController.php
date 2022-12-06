<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\nhanvien;
use App\Models\yeucau;
use App\Models\loaiyeucau;
use App\Models\thongbao;

use Carbon\Carbon;
class ReportController extends Controller
{
    public function index()
    {
        $dateNow=Carbon::parse(Carbon::now())->format('Y-m-d');
        $typeOfRequests=loaiyeucau::all();
        $reports=yeucau::where('Id_NhanVien','=',session()->get('user_id'))
                        ->with('loaiyeucau')
                        ->orderBy('Id_YeuCau','desc')
                        ->get();
        $employees=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))
                            ->get();
        return view('user.report.index',compact('dateNow','typeOfRequests','reports','employees'));
    }
    public function create(request $request)
    {
        $timeNow=Carbon::now();
        $report=new yeucau;
        $report->Id_NhanVien=session()->get('user_id');
        $report->Id_LoaiYeuCau=$request->loaiyeucau;
        $report->Ngay=carbon::now();
        $report->MoTa=$request->mota;
        $report->TinhTrang=0;
        $typeOfRequest=loaiyeucau::where('Id_LoaiYeuCau','=',$request->loaiyeucau)->get();
        $content=' Yêu cầu xử lý về '.$typeOfRequest[0]->TenLoaiYeuCau;
        if($report->save())
        {
        $employeesManager=nhanvien::where('Id_PhanQuyen','=',1)->get();
            foreach($employeesManager as $employee)
            {
                $notifi =new thongbao;
                $notifi->NguoiGui=session()->get('user_id');
                $notifi->NguoiNhan=$employee->Id_NhanVien;
                $notifi->Noidung=$content;
                $notifi->ThoiGian=$timeNow;
                $notifi->save();     
            }
            return back()->with('success','Đã gửi báo cáo thành công,xin vui lòng chờ quản trị viên duyệt');
        }
        else
        {
            return back()->with('error','Đã gửi báo cáo thất bại');
        }
    }
}
