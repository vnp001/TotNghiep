<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lichlamviec;
use App\Models\phongban;
use App\Models\nhanvien;
class WorkController extends Controller
{
    public function index()
    {
        
    }
    public function store(request $request)
    {
        $calendarWork=new lichlamviec;
        $calendarWork->Id_PhongBan=$request->phongban;
        $calendarWork->ChuDe=$request->chude;
        $calendarWork->ThanhPhan=$request->thanhphan;
        $calendarWork->DiaDiem=$request->diadiem;
        $calendarWork->NguoiChuTri= $request->nguoichutri;
        $calendarWork->Ngay=$request->ngay;
        $calendarWork->ThoiGian=$request->thoigian;
        $calendarWork->NoiDung=$request->noidung;
        $calendarWork->TinhTrang=1;
        if($calendarWork->save())
        {
            return back()->with('success','Đã tạo công việc thành công');
        }
        else
        {
            return back()->with('error','Tạo công việc thất bại');
        }
    }
    public function edit($id,$request)
    {
        $calendarWorkUpdate=lichlamviec::findOrFail($request->id)
                                    ->get();
        return view('','calendarWorkUpdate');
    }
    public function update($id,$request)
    {
        if($request->tinhtrang == true)
        {
            $check=1;
        }
        else
        {
            $check=0;
        }
        $calendarWorkUpdate=lichlamviec::findOrFail($id)
                        ->update([
            'Id_PhongBan'=> $request->phongban,
            'ChuDe'=> $request->chude,
            'NguoiChuTri' =>$request->nguoichutri,
            'ThanhPhan'=> $request->thanhphan,
            'DiaDiem'=> $request->điaiem,
            'Ngay'=> $request->ngay,
            'ThoiGian'=> $request->thoigian,
            'NoiDung'=> $request->noidung,
            'TinhTrang'=> $check
            ]); 
        
        if($calendarWorkUpdate)
        {
            return back()->with('success','cập nhập công  việc thành công');
        }
        else
        {
            return back()->with('error','cập nhập  công việc thất bại');
        }
    }
    public function remove(request $request)
    {
        $calendarWorkRemove=lichlamviec::findOrFail($id)
                                ->get();
        if($calendarWorkRemove->delete())
        {
            return back()->with('success','Xóa công  việc thành công');
        }
        else
        {
            return back()->with('error','Xóa  công việc thất bại');
        }
        
    }
}
