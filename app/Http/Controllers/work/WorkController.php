<?php

namespace App\Http\Controllers\work;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;

use App\Models\lichlamviec;
use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\chucvu;
use App\Models\phongban;
use App\Models\nhanvien;
use App\Models\congviec;
use App\Models\thongbao;


class WorkController extends Controller
{
    public function admin()
    {
        $employees=nhanvien::all();
        $Departments=phongban::all();
        $dateNow=Carbon::parse(Carbon::now())->format('Y-m-d');
        $works=congviec::with('phongban')
                        ->with('nguoigiao')
                        ->with('nhanvien')
                        ->get();
        $checkadmin=nhanvien::where('Id_NhanVien','=',session()->get('admin_id'))->get();
        return view('pages.work.index_Admin',compact('checkadmin','Departments','dateNow','works','employees'));
    }
    public function user()
    {
        $now = Carbon::now();
        $weekStartDate=new Carbon(now()->startOfWeek()->format('Y-m-d').'00:00:00');
        $weekEndDate=new Carbon(now()->endOfWeek()->format('Y-m-d').'00:00:00');
        
        $employees=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))
                        ->get();
        $checkManager=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();
       
        $employeeOfDerpartments=nhanvien::where('Id_PhongBan','=',$employees[0]->Id_PhongBan)
                        ->get();
        $employeeLaudatory=khenthuong::where('Ngay','>',$now->firstOfMonth()->format('Y-m-d'))
                                    ->where('Ngay','<=',$now->endOfMonth()->format('Y-m-d'))
                                    ->with('nhanvien')
                                    ->get();
        $employeeDiscipline=kyluat::where('Ngay','>',$now->firstOfMonth()->format('Y-m-d'))
                                    ->where('Ngay','<=',$now->endOfMonth()->format('Y-m-d'))
                                    ->with('nhanvien')
                                    ->get();
        $checkemployees=nhanvien::all();
        $works=congviec::with('phongban')
                        ->with('nhanvien')
                        ->with('nguoigiao')
                        ->orderBy('Id_CongViec', 'DESC')
                        ->get();
        $timeNow=$now->format('Y-m-d');
        return view('pages.work.index_User',compact('checkemployees','checkManager','timeNow','works','employeeOfDerpartments','weekStartDate','employees','weekEndDate','employeeLaudatory','employeeDiscipline'));
    }
    public function evaluatework($id,request $request)
    {
        $work=congviec::where('Id_CongViec','=',$id)
                        ->update([
            'TinhTrang'=> 0,
            'MoTa'=>$request->motatd,
            'TienDo'=> $request->danhgiatd
            ]); 
        
        if($work)
        {
            return back()->with('success','Hoàn thành');
        }
        else
        {
            return back()->with('error','Lỗi hoàn thành');
        } 
    }
    public function edit($id, request $request)
    {
        $work=congviec::where('Id_CongViec','=',$request->id)
        ->update([
                'Ngay'=> $request->ngayED,
                'ThoiGianBD' =>$request->ngaybatdauED,
                'ThoiGianKT'=> $request->ngayketthucED,
                'MoTa'=> $request->motaED,
                'TienDo'=> $request->tiendoED,
                'TinhTrang'=> $request->tinhtrangED
        ]); 
        if($work)
        {
            return back()->with('success','cập nhập  thành công');
        }
        else
        {
            return back()->with('error','cập nhập thất bại');
        }
    }
    public function store(request $request)
    {
        
        if($request->filecongviec !=null)
        {
            $file = $request->file('filecongviec');
            $originalname = $file->getClientOriginalName();
            $path=$file->move(public_path('/work'),$originalname);
            $file_name = pathinfo($path, PATHINFO_FILENAME);
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename=$file_name.'.'.$extension;
        }
        else
        {
            $filename='';
        }
        $work=new congviec;
        $nhanvien=$request->nhanvien ;
        $phongban=$request->phongban ;
        if($nhanvien == null)
        {
            $nhanvien=null;
        }
        if($phongban == null)
        {
            $phongban=null;
        }
        $work->Id_PhongBan=$phongban;
        $work->Ngay=$request->ngay;
        $work->Id_NhanVien=$nhanvien;
        $work->ThoiGianBD=$request->ngaybatdau;
        $work->ThoiGianKT=$request->ngayketthuc;
        $work->NoiDung=$request->noidung;
        $work->File=$filename;
        $work->NguoiGiao=$request->nguoigiao;
        $work->MoTa=null;
        $work->TinhTrang=1;
        $work->TienDo=0;

        if($work->save())
        {
            $timeNow=Carbon::now();
            $content='đã giao việc cho bạn';                            
            $nofition=new thongbao;
            $nofition->NguoiGui=$request->nguoigiao;
            $nofition->NguoiNhan=$request->nhanvien;
            $nofition->Noidung=$content;
            $nofition->ThoiGian=$timeNow;
            $nofition->save(); 
            return back()->with('success','Đã tạo công việc thành công');
        }
        else
        {
            return back()->with('error','Tạo công việc thất bại');
        }
    }
    // public function store(request $request)
    // {
    //     $calendarWork=new lichlamviec;
    //     $calendarWork->Id_PhongBan=$request->phongban;
    //     $calendarWork->ChuDe=$request->chude;
    //     $calendarWork->ThanhPhan=$request->thanhphan;
    //     $calendarWork->DiaDiem=$request->diadiem;
    //     $calendarWork->NguoiChuTri= $request->nguoichutri;
    //     $calendarWork->Ngay=$request->ngay;
    //     $calendarWork->ThoiGian=$request->thoigian;
    //     $calendarWork->NoiDung=$request->noidung;
    //     $calendarWork->TinhTrang=1;
        // if($calendarWork->save())
        // {
        //     return back()->with('success','Đã tạo công việc thành công');
        // }
        // else
        // {
        //     return back()->with('error','Tạo công việc thất bại');
        // }
    // }
    // public function edit($id,$request)
    // {
    //     $calendarWorkUpdate=lichlamviec::findOrFail($request->id)
    //                                 ->get();
    //     return view('','calendarWorkUpdate');
    // }
    public function updatederpantment(request $request)
    {
        $check=0;
        if($request->ttPB == true)
        {
            $check=1;
        }
        $work=congviec::where('Id_CongViec','=',$request->idcvPB)
                        ->update([
            'Id_PhongBan'=> $request->PB,
            'Ngay'=> $request->ngayPB,
            'ThoiGianBD' =>$request->ngaybatdauPB,
            'ThoiGianKT'=> $request->ngayketthucPB,
            'NoiDung'=> $request->noidungPB,
            'TinhTrang'=> $check
            ]); 
        if($work)
        {
            return back()->with('success','cập nhập công  việc thành công');
        }
        else
        {
            return back()->with('error','cập nhập  công việc thất bại');
        }
    }
    public function complete($id,request $request)
    {
        $work=congviec::where('Id_CongViec','=',$request->id)
                    ->update([
                'TienDo'=>$request->tiendocpl,
                'MoTa'=>$request->motacpl,
                'TinhTrang'=>0
            ]); 
        if($work)
        {
            return back()->with('success','cập nhập công  việc thành công');
        }
        else
        {
            return back()->with('error','cập nhập  công việc thất bại');
        }
    }
    public function updateemployee($id,request $request)
    {
        // $check=0;
        // if($request->tinhtrangNV == true)
        // {
        //     $check=1;
        // }
        $work=congviec::where('Id_CongViec','=',$request->id)
                        ->update([
            'Id_NhanVien'=> $request->NV,
            'Ngay'=> $request->ngayNV,
            'ThoiGianBD' =>$request->ngaybatdauNV,
            'ThoiGianKT'=> $request->ngayketthucNV,
            'NoiDung'=> $request->noidungNV,
            'TinhTrang'=> $request->tinhtrangNV
            ]); 
        if($work)
        {
            return back()->with('success','cập nhập công  việc thành công');
        }
        else
        {
            return back()->with('error','cập nhập  công việc thất bại');
        }
    }
    public function remove($id,request $request)
    {
        $workRemove=congviec::where('Id_CongViec','=',$id);
                                // ->get();
        if($workRemove->delete())
        {
            return back()->with('success','Xóa công  việc thành công');
        }
        else
        {
            return back()->with('error','Xóa  công việc thất bại');
        }
        
    }
}
