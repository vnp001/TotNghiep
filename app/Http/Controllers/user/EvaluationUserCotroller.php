<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;

use App\Models\nhanvien;
use App\Models\danhgia;
use App\Models\phongban;


class EvaluationUserCotroller extends Controller
{
    public function index()
    {
        $employyees=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))
                            ->with('phanquyen')
                            ->get();
        $employyeeOfDerpantments=nhanvien::where('Id_PhongBan','=',$employyees[0]->Id_PhongBan)
                                        ->get();
        $dateNow=Carbon::now()->format('Y-m-d');
        $Manager=phongban::where('NguoiQuanLy','=',$employyees[0]->Id_NhanVien)
                        ->with('truongphong')
                        ->get();
        return view('user.evaluation.index',compact('dateNow','Manager','employyeeOfDerpantments','employyees'));
    }
    public function store(request $request)
    {
        if($request->filedanhgia == null)
        {
            $filename=null;
        }
        else
        {
            $file = $request->file('filedanhgia');
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/folderEvalution'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;
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
    public function update($id,request $request)
    {
       
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
            return  back()->with('success','Cập nhập đánh giá nhân viên thành công');
        }
        else
        {
            return back()->with('error',' Cập nhập đánh giá nhân viên thất bại');
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
