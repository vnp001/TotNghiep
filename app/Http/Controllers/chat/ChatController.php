<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


use App\Models\chatbox;
use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\noidungchat;

class ChatController extends Controller
{
        // amdin
    public function chat_admin()
    {
        $chatBoxs=chatbox::all();
        $Departments=phongban::all();
        $employees=nhanvien::all();
        
        return view('pages.chat.admin.index_Admin',compact('employees','Departments','chatBoxs')); 
    }
    public function detail_admin($id)
    {
        $chatBoxs=chatbox::where('Id_ChatBox','=',$id)->get();
        $employees=nhanvien::all();
        return view('pages.chat.admin.detailchat',compact('employees','chatBoxs')); 
    }
    public function updatechat ($id,request $request)
    {
        $chatBoxs=chatbox::where('Id_ChatBox','=',$id)
                        ->update([
                            'TenChatBox'=>$request->tennhom,
                        ]);
        if($chatBoxs)
        {
            return back()->with('success', 'Đổi thành công');
        }
        else
        {
    
            return back()->with('error', 'Đổi thất bại');
        }
        
    }
    public function data(request $request,$id)
    {
      
        $chats=noidungchat::where('Id_ChatBox','=',$id)
                        ->with('chatbox')
                        ->with('nhanvien')
                        ->get();
        $contentchats=noidungchat::all();
        return view('pages.chat.loaddata',compact('chats','contentchats')); 
    }
    public function datachatbox_admin()
    {
        $info=nhanvien::where('Id_NhanVien','=',session()->get('admin_id'))->get();
        $chatBoxs=chatbox::where('NguoiTao','=',$info[0]->Id_NhanVien)
                        ->orwhere('Id_PhongBan','=',$info[0]->Id_PhongBan)
                        ->orwhere('ToUser','=',$info[0]->Id_NhanVien)
                        ->orderBy('Id_ChatBox', 'DESC')
                        ->get(); 
        
        return view('pages.chat.admin.loaddatachatbox',compact('chatBoxs')); 
    }
    public function datachatbox_user()
    {
        $info=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();
        $chatBoxs=chatbox::where('NguoiTao','=',$info[0]->Id_NhanVien)
                        ->orwhere('Id_PhongBan','=',$info[0]->Id_PhongBan)
                        ->orwhere('ToUser','=',$info[0]->Id_NhanVien)
                        ->orderBy('Id_ChatBox', 'DESC')
                        ->get();    
        return view('pages.chat.user.loaddatachatbox',compact('chatBoxs')); 
    }
    public function createchat(request $request)
    {
        $file = $request->file('hinhanh');
        $originalname = $file->getClientOriginalName();
        $path=$file->move(public_path('/chatbox'),$originalname);
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename=$file_name.'.'.$extension;

        $timeNow=Carbon::now();
        $phongban=$request->phongban;
        $touser=$request->nhanvien;
        $nguoitao=null;
        if(session()->has('admin_id'))
        {
            $nguoitao=session()->get('admin_id');
        }
        if(session()->has('user_id'))
        {
            $nguoitao=session()->get('user_id');
        }
        if($phongban == null)
        {
            $phongban=null;
        }
        if($touser == null)
        {
            $touser=null;
        }
        $chatbox=new chatbox ;
        $chatbox->NguoiTao=$nguoitao;
        $chatbox->Id_PhongBan=$phongban;
        $chatbox->ToUser=$touser;
        $chatbox->TenChatBox=$request->tennhom;
        $chatbox->HinhAnh=$filename;
        $chatbox->ThoiGian=$timeNow;
      
        if( $chatbox->save())
        {
            return back()->with('success', 'Tạo thành công');
        }
        else
        {
    
            return back()->with('error', 'Tạo thất bại');
        }
    }
    public function addchat(request $request)
    {
        $addUser=new noidungchat;
        $addUser->Id_NhanVien=$request->nhanvienA;
        $addUser->Id_ChatBox=$request->phongchat;
        $addUser->NoiDung=null;
        $addUser->ThoiGian=new Carbon('00:00:00');
        if( $addUser->save())
        {
            return back()->with('success', 'Thêm thành công');
        }
        else
        {
    
            return back()->with('error', 'Thêm thất bại');
        }
        
    }
    public function createchat_admin(request $request)
    {
        $timeNow=Carbon::now();
        $contentChat=new noidungchat;
        $contentChat->Id_ChatBox=$request->idchat;
        $contentChat->Id_NhanVien=$request->nhanvien;
        $contentChat->NoiDung=$request->text;
        $contentChat->ThoiGian=$timeNow;
        $contentChat->save();
        
        return response()->json($contentChat);
    }
    public function detroychat_admin()
    {
        
    }
    public function chat_user()
    {
        $info=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();
        $chatBoxs=chatbox::where('NguoiTao','=',$info[0]->Id_NhanVien)
                        ->orwhere('Id_PhongBan','=',$info[0]->Id_PhongBan)
                        ->orwhere('ToUser','=',$info[0]->Id_NhanVien)
                        ->orderBy('Id_ChatBox', 'DESC')
                        ->get();

        $Departments=phongban::where('Id_PhongBan','=',$info[0]->Id_PhongBan)->get();
        $employees=nhanvien::where('Id_PhongBan','=',$info[0]->Id_PhongBan)
                            ->orwhere('Id_PhongBan','=',9)
                            ->get();
        return view('pages.chat.user.index_User',compact('employees','Departments','contentchats','chatBoxs'));
    }
    public function createchat_user(request $reuqest)
    {
        
    }
     public function loadchat_user($id)
    {
        $chatBoxs=chatbox::all();
        $chats=noidungchat::where('Id_ChatBox','=',$id)
                        ->with('chatbox')
                        ->with('nhanvien')
                        ->get();
        $contentchats=noidungchat::all();
        return view('pages.chat.user.loaddata',compact('chats','contentchats','chatBoxs')); 
 
    }
    public function storechat_user(request $request)
    {
        \Carbon\Carbon::setLocale('vi');   
        $timeNow=Carbon::now()->format('y-m-d H:m');
        $contentChat=new noidungchat;
        $contentChat->Id_ChatBox=$request->idchat;
        $contentChat->Id_NhanVien=$request->nhanvien;
        $contentChat->NoiDung=$request->text;
        $contentChat->ThoiGian=$timeNow;
        $contentChat->save();
    

        return response()->json($contentChat);
    }
    public function detailchat_user($id)
    {
        $employees=nhanvien::where('Id_PhongBan','=',session()->get('user_id'))->get();
        $chatBoxs=chatbox::where('Id_ChatBox','=',$id)->get();
        return view('pages.chat.user.detailchat',compact('chatBoxs','employees')); 
    }
  
}
