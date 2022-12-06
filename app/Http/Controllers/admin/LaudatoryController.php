<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khenthuong;
use App\Models\nhanvien;
use Carbon\Carbon;


class LaudatoryController extends Controller
{
    public function index()
    {
        $laudatorys=khenthuong::with('nhanvien')
                                ->get();
        $employees=nhanvien::all();
        return view('admin.laudatory.index',compact('laudatorys','employees'));
    }
    public function store(request $request)
    {
        $laudatory=new khenthuong;
        $laudatory->Id_NhanVien=$request->nhanvien;
        $laudatory->Ngay=$request->ngay;
        $laudatory->MoTa=$request->mota;
        $laudatory->Thuong=$request->thuong;
       
        if($laudatory->save())
        {
            return back()->with('success','Khen thường nhân viên thành công');
        }
        else
        {
            return back()->with('error','khen thưởng nhân viên thất bại');
        }
        
    }
}
