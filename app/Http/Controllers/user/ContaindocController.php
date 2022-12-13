<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;

use App\Models\nhanvien;
use App\Models\tailieu;

class ContaindocController extends Controller
{
    public function index()
    {
        $dateNow=\Carbon\Carbon::parse(Carbon::now())->format('Y-m-d');
        $containDocs=tailieu::with('nhanvien')
                                ->orderBy('ThoiGian','DESC')
                                ->paginate(5);
        $containDocShareds=tailieu::where('Id_NhanVien','=',session()->get('user_id'))
                            ->orderBy('ThoiGian','DESC')
                            ->with('nhanvien')
                            ->get();
                            // dd($containDocShareds);
        return view('user.containdoc.index',compact('containDocs','dateNow','containDocShareds'));
    }
    public function create(request $request)
    {
        $file = $request->file('tailieu');
        $originalname = $file->getClientOriginalName();
        $path=$file->move(public_path('/documents'),$originalname);
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename=$file_name.'.'.$extension;

        $containDoc=new tailieu;
        $containDoc->Id_NhanVien=session()->get('user_id');
        $containDoc->TaiLieu=$filename;
        $containDoc->MoTa=$request->mota;
        $containDoc->ThoiGian=Carbon::now();
        
        if($containDoc->save())
        {    
            return back()->with('success','Bạn đã chia sẽ  tài liệu thành công');
        }
        else
        {
            return back()->with('error','Bạn đã chia sẽ  tài liệu thất bại');
        } 
        // return view('user.containdoc.index',compact('containDocs'));
    }
    public function destroy($id)
    {
       $destroyContainDoc=tailieu::where('Id_TaiLieu','=',$id);
       if($destroyContainDoc->delete())
       {    
           return back()->with('success','Bạn đã xóa tài liệu thành công');
       }
       else
       {
           return back()->with('error','Bạn đã xóa tài liệu thất bại');
       } 
    }
}
