<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\nhanvien;

use Cookie;


class LoginController extends Controller
{

    public function index()
    {
        if(session()->has('admin_id'))
        {
            $admin=nhanvien::where('Id_NhanVien','=',session()->get('admin_id'))->get();
            return redirect('/admin')->with('comeback','Chào mừng '.$admin[0]->Ten.' đã trở lại');
        }
       else if(session()->has('user_id'))
        {
            $user=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();

            return redirect('/user')->with('comeback','Chào mừng '.$user[0]->Ten.' đã trở lại');
        }
        else{
            return view('dangnhap');
        }
    }
    public function check(Request $request )
    {
        $request->validate([
            'taikhoantxt' => ['required', 'string', 'max:255'],
            'matkhautxt'=> ['required', 'string', 'max:255'],
        ]);

        $user=nhanvien::where(['TenTK'=> $request->taikhoantxt, 'MatKhau'=> $request->matkhautxt])->get();
        if(count($user)>0)
        {
            if($request->ghinho)
            {      
                Cookie::queue('tentaikhoan',$request->taikhoantxt,1440);
                Cookie::queue('matkhau',$request->matkhautxt,1440);      
            }
            else
            {
                // echo 'chua bat';
                \Cookie::queue(\Cookie::forget('tentaikhoan'));
                \Cookie::queue(\Cookie::forget('matkhau'));
            }
            foreach($user as $value)
            {
                switch($value->Id_PhanQuyen)
                {
                    case 1:
                      
                        $request->session()->put('admin_id',$value->Id_NhanVien);
                        return redirect('/admin')->with('welcome','xin chào '.$value->Ten);   
                        break;
                    case 2:
                        $request->session()->put('user_id', $value->Id_NhanVien);
                        return redirect('/user')->with('welcome','xin chào '.$value->Ten);
                }
            }  
        }
        else
        {
            return back()->with('error','Bạn đã nhập sai tài khoản !!!');
        }
    }
    public function logoutadmin(Request $request)
    {
        $UpdateEmployee=nhanvien::where(['Id_NhanVien'=> session()->get('admin_id')])->update([
            'TrangThai' => 0
          ]);
        if($UpdateEmployee)
        {
            $request->session()->forget('admin_id');
            return redirect('/');       
        }
        else
        {
            echo 'loi';
        }
     
    }
    public function logoutuser(Request $request)
    {
        $UpdateEmployee=nhanvien::where(['Id_NhanVien'=> session()->get('user_id')])->update([
            'TrangThai' => 0
          ]);
       $request->session()->forget('user_id');
       return redirect('/');
    }
   
    public function changepassadmin(Request $request)
    {
        $passadmin=nhanvien::where(['Id_NhanVien'=> session()->get('admin_id')]);
        if( $request->nhaplaimk == $request->matkhaumoi)
        {
            $updatepass=$passadmin->update([
                'MatKhau'  => $request->matkhaumoi
            ]);
            if($updatepass)
            {
                return back()->with('success','Bạn đã đổi mật khẩu thành công');
            }
            else
            {
                return back()->with('error','Bạn đã đổi mật khẩu thất bại');
            }
        }
        else{
            return back()->with('errorinput','Bạn đã nhập sai mật khẩu');
        }
    }
    public function changepassuser(Request $request)
    {
        $passuser=nhanvien::where(['Id_NhanVien'=> session()->get('user_id')]);
        if( $request->nhaplaimk == $request->matkhaumoi)
        {
            $updatepass=$passuser->update([
                'MatKhau'  => $request->matkhaumoi
            ]);
            if($updatepass)
            {
                return back()->with('success','Bạn đã đổi mật khẩu thành công');
            }
            else
            {
                return back()->with('error','Bạn đã đổi mật khẩu thất bại');
            }
        }
        else{
            return back()->with('errorinput','Bạn đã nhập sai mật khẩu');
        }
    }
}
