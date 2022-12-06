<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use File;
use App\Models\tailieu;
use App\Models\nhanvien;
use App\Models\phongban;

class tailieuController extends Controller
{
    public function index()
    {
        $dateNow=\Carbon\Carbon::parse(Carbon::now())->format('d / m / Y   H : s : i');
        $phongban=phongban::all();
        $admin=nhanvien::where('Id_NhanVien','=',session()->get('admin_id'))->get();
        $tailieu=tailieu::with('nhanvien')
                        ->orderBy('ThoiGian','ASC')
                        ->get();
        foreach($tailieu as $tl)
        {
            $nhanvien=nhanvien::where('Id_NhanVien','=',$tl->Id_NhanVien)->with('phongban')->get();
        }
       
        return view('admin.tailieu.index',compact('tailieu','admin','phongban','nhanvien','dateNow'));
    }
    public function store(request $request)
    {
    //      echo $file=$request->tailieu;
    //    $filePath='containerDoc/'.$file;
    //     Storage::disk('local')->put($filePath,$file);
    //     echo $request->tailieu;
        $file = $request->file('tailieu');
        $originalname = $file->getClientOriginalName();
        $path=$file->move(public_path('/documents'),$originalname);
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename=$file_name.'.'.$extension;

        $tailieu=new tailieu;
        $tailieu->Id_NhanVien=session()->get('admin_id');
        $tailieu->TaiLieu=$filename;
        $tailieu->MoTa=$request->mota;
        $tailieu->ThoiGian= Carbon::now();
        // $file = $request->file('tailieu');
        // $file_name = $file->getClientOriginalName();
        // $extension=$request->file('tailieu')->getOriginalClientExtension();
        
        // $filename = pathinfo($file_name, PATHINFO_FILENAME);
        // $fileNameToStore=$filename.'_'.time().'.'$extension;
        // $file->move(public_path('/documents'),$file_name);
   
        if($tailieu->save())
        {    
            return back()->with('success','Thêm tài liệu thành công');
        }
        else
        {
            return back()->with('error','Thêm tài liệu thất bại');
        } 
    }
    public function destroy($id)
    {
        $destroytailieu=tailieu::where('Id_TaiLieu','=',$id);
        if($destroytailieu->delete())
        {
            return back()->with('success','Xóa tài liệu thành công');
        }
        else
        {
            return back()->with('error','Xóa tài liệu thất bại');
        }
    }
}
