<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

use App\Models\danhgia;
use App\Models\nhanvien;


class EvaluationCotroller extends Controller
{
    public function index()
    {
        $employyees=nhanvien::with('phanquyen')
                            ->get();;
        $evaluations=danhgia::with('nhanvien')
                            ->get();
        // dd($evaluations);
        return view('admin.evaluation.index',compact('employyees','evaluations'));
    }
    public function store(request $request)
    {
        $file = $request->file('filedanhgia');
        if($file != null)
        {
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/folderEvalution'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;
        }
        else
        {
            $filename = null;
        }

        $evaluation=new danhgia;
        $evaluation->NhanVien=$request->nhanvien;
        $evaluation->Ngay=$request->ngay;
        $evaluation->NguoiDanhGia=$request->nguoidanhgia;
        $evaluation->HinhThuc=$request->hinhthuc;
        $evaluation->NoiDung=$request->noidung;
        $evaluation->File=$filename;
        if($evaluation->save())
        {    
            return back()->with('success','Đánh giá nhân viên thành công');
        }
        else
        {
            return back()->with('error','Đánh giá nhân viên thất bại');
        } 
        
    }
    public function edit($id)
    {
        $employyees=nhanvien::with('phanquyen')
                            ->get();
        $evaluations=danhgia::where('Id_DanhGia','=',$id)
                            ->with('nhanvien')
                            ->get();
        return view('admin.evaluation.edit',compact('evaluations','employyees'));
    }
    public function update($id,request $request)
    {
        // $file = $request->file('filedanhgia');
        // $originalname = $file->getClientOriginalName();
        // $path=$file->move(public_path('/folderEvalution'),$originalname);
        // $file_name = pathinfo($path, PATHINFO_FILENAME);
        // $extension = pathinfo($path, PATHINFO_EXTENSION);
        // $filename=$file_name.'.'.$extension;

        $evaluation=danhgia::where('Id_DanhGia','=',$id)
                    ->update([
            'NhanVien'=>$request->nhanvien,
            'Ngay'=>$request->ngay,
            'NguoiDanhGia'=>$request->nguoidanhgia,
            'NoiDung'=>$request->noidung,
            'HinhThuc'=>$request->hinhthuc,
            // 'File'=>$filename
        ]);
        if($evaluation)
        {    
            return  redirect('/admin/evaluation')->with('success','Xóa đánh giá nhân viên thành công');
        }
        else
        {
            return back()->with('error',' Xóa đánh giá nhân viên thất bại');
        } 
    }
    public function destroy($id)
    {
        $evaluation=danhgia::where('Id_DanhGia','=',$id);
        if($evaluation->delete())
        {    
            return back()->with('success','Xóa đánh giá nhân viên thành công');
        }
        else
        {
            return back()->with('error',' Xóa đánh giá nhân viên thất bại');
        } 
    }
}
