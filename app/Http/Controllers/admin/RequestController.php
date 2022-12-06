<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\yeucau;
use App\Models\thongbao;

class RequestController extends Controller
{
    public function index()
    {
        $listRequest=yeucau::with('nhanvien')
                            ->with('loaiyeucau')
                            ->orderBy('Ngay', 'DESC')
                            ->get();
        return view('admin.request.index',compact('listRequest'));
    }
    public function agree($id,request $request)
    {
        $timeNow=Carbon::now();
        $processRequest=yeucau::where('Id_YeuCau','=',$id)
                            ->update([
                                'TinhTrang'=> 1
                            ]);
        // echo $request->dongy;
        $content='đã duyệt yêu cầu';                            
        $nofition=new thongbao;
        $nofition->NguoiGui=session()->get('admin_id');
        $nofition->NguoiNhan=$request->dongy;
        $nofition->Noidung=$content;
        $nofition->PhongBan=null;
        $nofition->ThoiGian=$timeNow;
        $nofition->save(); 
        if($processRequest)
        {
            return back();
        }  
        else
        {
            echo 'lỗi';
        }
    }
    public function remove($id,request $request)
    {
        $timeNow=Carbon::now();
        $processRequest=yeucau::where('Id_YeuCau','=',$id)
                            ->update([
                                'TinhTrang'=> 3
                            ]);
        $content='Không duyệt yêu cầu';                            
        $nofition=new thongbao;
        $nofition->NguoiGui=session()->get('admin_id');
        $nofition->NguoiNhan=$request->tuchoi;
        $nofition->Noidung=$content;
        $nofition->PhongBan=null;
        $nofition->ThoiGian=$timeNow;
        $nofition->save(); 
        if($processRequest)
        {
            return back();
        }  
        else
        {
            echo 'lỗi';
        }
    }
}
