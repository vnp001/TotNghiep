<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phongban;
use App\models\nhanvien;
class DepartmentController extends Controller
{
    public function index()
    {
        $employees=nhanvien::all();
        $departments=phongban::with('truongphong')->get();
        return view('admin.department.index',compact('departments','employees'));
    }
    public function store(request $request)
    {
        $department=new phongban;
        $department->TenPhongBan=$request->tenphongban;
        $department->NguoiQuanLy=$request->nguoiquanly;
        if($department->save())
        {
            return back()->with('success','Tạo phòng ban thành công');
        }
        else
        {
            return back()->with('error','Tạo phòng ban thất bại');
        }
    }
    public function update(request $request,$id)
    {
        $department=phongban::where(['Id_PhongBan'=> $id])
                        ->update([
                        'TenPhongBan'=>$request->editenphongban,
                        'NguoiQuanLy'=>$request->editnguoiquanly
                    ]);
        if($department)
        {
            return back()->with('success','Sửa phòng ban thành công');
        }
        else
        {
            return back()->with('error','Sửa  văn bản thất bại');
        }
    }
    
    public function destroy($id)
    {
        $department=phongban::where(['Id_PhongBan'=> $id]);
        if($department->delete())
        {
            return back()->with('success','Xóa phòng ban thành công');
        }
        else
        {
            return back()->with('error','Xóa văn bản thất bại');
        }
    }
    public function detail($id)
    {
        $departments=phongban::where('Id_PhongBan','=',$id)
                                ->get();
        $sumDepartment=nhanvien::where('Id_PhongBan','=',$id)
                                ->count();
        $employees=nhanvien::where('Id_PhongBan','=',$id)
                                ->with('chucvu')
                                ->get();
        return view('admin.department.detail',compact('departments','sumDepartment','employees'));
    }
    
}
