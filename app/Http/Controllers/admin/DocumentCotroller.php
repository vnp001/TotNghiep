<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


use App\Models\loaivanban;
use App\Models\vanban;
use App\Models\nhanvien;


class DocumentCotroller extends Controller
{
    public function index()
    {
        $documents=vanban::with('loaivanban')
                        ->with('nhanvien')
                        ->get();
        return view('admin.document.index',compact('documents'));
    }
    public function createdoc()
    {
        $sumdocument=vanban::all()
                            ->count();
        $typeofdocs=loaivanban::all();
        $employees=nhanvien::all();
        $now=Carbon::now();
        $dateNow=Carbon::parse($now)->format('Y-m-d');
        return view('admin.document.create',compact('dateNow','sumdocument','employees','typeofdocs'));
      
    }
    public function storedoc(request $request)
    {
        $file = $request->file('hinhanh');
        $originalname = $file->getClientOriginalName();
        $path=$file->move(public_path('/documents'),$originalname);
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename=$file_name.'.'.$extension;
        $doc=new vanban;
        $doc->Id_NhanVien=$request->nguoiki;
        $doc->Id_LoaiVanBan=$request->loaivanban;
        $doc->Sovb=$request->sovanban;
        $doc->TenVanBan=$request->tenvanban;
        $doc->NoiDung=$request->noidung;
        $doc->Ngay=$request->ngay;
        $doc->HinhAnh=$filename;
        if($doc->save())
        {
            return redirect('/admin/document')->with('success','Tạo văn bản thành công');
        }
        else
        {
            return back()->with('error','Tạo  văn bản thất bại');
        }
    }
    public function editdoc($id)
    {
        $docs=vanban::where(['Id_VanBan'=>$id])
                    ->get();
        $typeofdocs=loaivanban::all();
        $employees=nhanvien::all();
        return view('admin.document.edit',compact('docs','typeofdocs','employees'));
    }
    public function updatedoc(request $request,$id)
    {
        $UpdateDoc=vanban::where(['Id_VanBan'=> $id])
                    ->update([
                    'Id_NhanVien'=>$request->nguoiki,
                    'Id_LoaiVanBan'=>$request->loaivanban,
                    'TenVanBan'=>$request->tenvanban,
                    'NoiDung'=>$request->noidung
                 ]);
          if($UpdateDoc)
          {
            return redirect('admin/document')->with('success', 'Sửa văn bản thành công');
          }
          else
          {
            return back()->with('error', 'Sửa văn bản nhân viên thất bại');
          }
    }
    public function destroydoc($id)
    {
        $doc=vanban::where(['Id_VanBan'=> $id]);
       if($doc->delete())
        {
          return back()->with('success', 'Xóa văn bản thành công');
        }
        else
        {
          return back()->with('error', 'Xóa văn bản thất bại');
        }
    }
    public function detaildoc($id)
    {
        $doc=vanban::where(['Id_VanBan'=> $id])
                    ->with('nhanvien')
                    ->get();
        return view('admin.document.detail',compact('doc')); 
    }
    
                        // loại văn bản
    public function typedoc()
    {
        $typedoc=loaivanban::all();
        return view('admin.document.typeofdocument.index',compact('typedoc'));
    }
    public function storetypedoc(request $request)
    {
        $typedoc=new loaivanban;
        $typedoc->TenLoaiVanBan=$request->tenloaivanban;
        if($typedoc->save())
        {
            return redirect('/admin/document/typeofdocument')->with('success','Lưu loại văn bản thành công');
        }
        else
        {
            return back()->with('error','Lưu loại văn bản thất bại');
        }
        // return view('admin.document.typeofdocument.index');
    }
    public function edittypedoc(request $request)
    {
        $updatetypedoc=loaivanban::where('Id_LoaiVanBan',$request->idloaivanban)
                    ->update([

                "TenLoaiVanBan"=> $request->tenloaivanban
                    
            ]);
        if($updatetypedoc)
        {
            return back()->with('success','Cập nhập loại văn bản thành công');
        }
        else
        {
            return back()->with('error','Lỗi cập nhập loại văn bản');
        }
    }
    public function destroytypedoc(request $request)
    {
        $destroytypedoc=loaivanban::where(['Id_LoaiVanBan'=>$request->Id_loaivanban]);
        if($destroytypedoc->delete())
        {
            return redirect('/admin/document/typeofdocument')->with('success','Xóa loại văn bản thành công');
        }
        else
        {
            return back()->with('error','Xóa loại văn bản');
        }
    }
    // USER

   
}
