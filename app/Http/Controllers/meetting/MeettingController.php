<?php

namespace App\Http\Controllers\meetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\nhanvien;
use App\Models\hop;
use App\Models\phongban;
use App\Models\thongbao;


class MeettingController extends Controller
{
    public function store(request $request)
    {
        $fileMeetting = $request->file;
        if($fileMeetting != null)
        { 
            $file = $request->file('file');
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/documents'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;
        }
        else
        {
            $filename = null;
        }
        $phongban=$request->phongban;
        if($phongban == null)
        {
            $phongban = null;
        }
        $meetting=new hop;
        $meetting->Id_PhongBan=$phongban;
        $meetting->ThanhPhan=$request->thanhphan;
        $meetting->DiaDiem=$request->diadiem;
        $meetting->NguoiChuTri=$request->nguoichutri;
        $meetting->Ngay=$request->ngay;
        $meetting->ThoiGian=$request->thoigian;
        $meetting->NoiDung=$request->noidung;
        $meetting->File=$filename;
        $meetting->TinhTrang=0;
        $timeNow=Carbon::now();
        
        $notifition=new thongbao;
        $notifition->NguoiGui=session()->get('admin_id');
        $notifition->NguoiNhan=null;
        $notifition->PhongBan=$phongban;
        $notifition->NoiDung='Thông báo cuộc họp';
        $notifition->ThoiGian=$timeNow;
      if($meetting->save())
        {
            $notifition->save();
            return back()->with('success','Tạo lịch họp thành công'); 
        }  
        else
        {
            return back()->with('error','Tạo lịch họp  thất bại');
        }
    }
    public function createmt_user(request $request)
    {
        $getDerparment=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();
        $fileMeetting = $request->file;
        if($fileMeetting != null)
        { 
            $file = $request->file('file');
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/documents'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;
        }
        else
        {
            $filename = null;
        }

        $meetting=new hop;
        $meetting->Id_PhongBan=$getDerparment[0]->Id_PhongBan;
        $meetting->ThanhPhan=$request->thanhphan;
        $meetting->DiaDiem=$request->diadiem;
        $meetting->NguoiChuTri=session()->get('user_id');
        $meetting->Ngay=$request->ngay;
        $meetting->ThoiGian=$request->thoigian;
        $meetting->NoiDung=$request->noidung;
        $meetting->File=$filename;
        $meetting->TinhTrang=0;
        
        $timeNow=Carbon::now();

        $notifition=new thongbao;
        $notifition->NguoiGui=session()->get('user_id');
        $notifition->NguoiNhan=null;
        $notifition->PhongBan=$getDerparment[0]->Id_PhongBan;
        $notifition->NoiDung='Thông báo cuộc họp';
        $notifition->ThoiGian=$timeNow;
      if($meetting->save())
        {
            $notifition->save();
            return back()->with('success','Tạo lịch họp thành công'); 
        }  
        else
        {
            return back()->with('error','Tạo lịch họp  thất bại');
        }
    }
    public function update($id,request $request)
    {
        $phongban=$request->phongbanUD;
        if($phongban ==null)
        {
            $phongban=null;
        }
        if($request->tinhtrangUD==true)
        {
            $tinhtrang=1;
        }
        else
        {
            $tinhtrang=0;
            
        }
        $meetting=hop::where('Id','=',$id)
        ->update([
            'Id_PhongBan'=>$phongban,
            'ThanhPhan'=>$request->thanhphanUD,
            'DiaDiem'=>$request->diadiemUD,
            'NguoiChuTri'=>$request->nguoichutriUD,
            'Ngay'=>$request->ngayUD,
            'ThoiGian'=>$request->thoigianUD,
            'NoiDung'=>$request->noidungUD,
            'TinhTrang'=>$tinhtrang
        ]);
        
        $notifition=new thongbao;
        $notifition->NguoiGui=session()->get('admin_id');
        $notifition->NguoiNhan=null;
        $notifition->PhongBan=$phongban;
        $notifition->NoiDung='Thông báo đã cập nhập lại cuộc họp';
        $notifition->ThoiGian=$timeNow;
        if($meetting)
        {
            $notifition->save();
            return back()->with('success','Update lịch họp thành công'); 
        }  
        else
        {
            return back()->with('error','Update lịch họp  thất bại');
        }
    }
    public function destroy($id)
    {
        $meetting=hop::where('Id','=',$id);

         if($meetting->delete())
        {
            return back()->with('success','Xóa lịch họp thành công'); 
        }  
        else
        {
            return back()->with('error','xóa lịch họp  thất bại');
        }
    }
}
