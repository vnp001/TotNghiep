<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kyluat;
use App\Models\nhanvien;
class DisciplineController extends Controller
{
    public function index()
    {
        $discoplines=kyluat::with('nhanvien')
                            ->get();
        $employees=nhanvien::all();
        return view('admin.discipline.index',compact('discoplines','employees'));
    }
    public function store(request $request)
    {
        $discopline=new kyluat;
        $discopline->Id_NhanVien= $request->nhanvien;
        $discopline->Ngay=$request->ngay;
        $discopline->MoTa=$request->mota;
        $discopline->Phat=$request->phat;

        if($discopline->save())
        {
            return back()->with('success','kỹ luật nhân viên thành công');
        }
        else
        {
            return back()->with('success','kỹ luật nhân viên thất bại');
        }
    }
}
