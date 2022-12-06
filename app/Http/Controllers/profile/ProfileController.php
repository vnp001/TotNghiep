<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\nhanvien;

class ProfileController extends Controller
{
    public function admin()
    {
        return view('pages.profile.admin.index');
    }
    public function user()
    {
        return view('pages.profile.user.index');
    }
    public function UpdateImage(request $request)
    {
        if($request->hinhanh != null)
        {
            $file = $request->file('hinhanh');
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/Images'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;

            $nhanvien=null;
            if(session()->has('admin_id'))
            {
                $nhanvien=session()->get('admin_id');
            }
            if(session()->has('user_id'))
            {
                $nhanvien=session()->get('user_id');
            }
            $uploadImages=nhanvien::where('Id_NhanVien','=',$nhanvien)
                                    ->update([
                        'HinhAnh'=>$filename
                                    ]);
            return back()->with('success','Cập nhập ảnh đại diện thành công');
        }       
    }
}
