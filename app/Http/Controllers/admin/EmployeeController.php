<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\nhanvien;
use App\Models\chucvu;
use App\Models\phanquyen ;
use App\Models\chuyenmon ;
use App\Models\bomon;
use App\Models\phongban;
use App\Models\donvi;
use App\Models\bac;
use App\Models\ngach;
use App\Models\danhgia;
use App\Models\luong;
use App\Models\tdchuyenmon;
use App\Models\tinhoc;
use App\Models\ngoaingu;
use App\Models\chinhtri;
use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\chamcong;
use App\Models\ketquadaotao;


// use App\Models\tdchuyenmon;

use DB;
// use TableChucvu;

class EmployeeController extends Controller
{
 
    public function index()
    {
      // $InfoAdmin=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->get();
      $listemployee=nhanvien::with('phanquyen')
                              ->get();      
      $tongnhanvien=$listemployee->count();
      $nhanviennam=$listemployee->where('GioiTinh','Nam')->count();
      $nhanviennu=$listemployee->where('GioiTinh','Nữ')->count();
      // $UpdateEmployee=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->update([
      //   'TrangThai' => 1 
      // ]);
      return view('admin.employee.index',compact('listemployee','tongnhanvien','nhanviennam','nhanviennu'));
      // return view('admin.employee.index',compact('listemployee'));
    } 
    public function degree()
    {
      $listdegree=nhanvien::all();
      return view('admin.employee.degree.index',compact('listdegree'));
    } 
    public function position()
    {
      $listposition=nhanvien::with('chucvu')
                              ->with('ngoaingu')
                              ->with('trinhdochuyenmon')
                              ->with('tinhoc')
                              ->with('chinhtri')
                              ->get();
      return view('admin.employee.position.index',compact('listposition'));
    } 
    public function pagecreate()
    {    
 
      // $listchucvu=chucvu::all();
      // $listphanquyen=phanquyen::all();
      // $listdonvi=donvi::all();
      // $listphongban=donvi::all();
      // $listchuyenmon=chuyenmon::all();
      // $listbomon=bomon::all();
        $listchucvu=chucvu::all();
        $listdonvi=donvi::all();
        $listphongban=phongban::all();
        $listphanquyen=phanquyen::all();
        //  trình độ
        $listtdchuyenmon=tdchuyenmon::all();
        $listtdtinhoc=tinhoc::all();
        $listtdngoaingu=ngoaingu::all();
        $listchinhtri=chinhtri::all();

        $listchuyenmon=chuyenmon::all();
        $listbomon=bomon::all();

        // bậc ngạch lương
        $levelofEmployees=bac::with('ngach')->get();
      return view('admin.employee.create', compact('levelofEmployees','listdonvi','listchucvu','listtdchuyenmon','listtdtinhoc','listtdngoaingu','listchinhtri','listphanquyen','listchuyenmon','listbomon','listphongban'));
    } 
    public function store(request $request)
    {
      
      $employee=new nhanvien();
      // echo $request->cacchucvu;
        // trình độ
      // $employee->Id_ChucVu=$request->chucvu;
      // $employee->Id_PhongBan='1';
      // $employee->Id_ChuyenMon=$request->chuyenmon;
      // $employee->Id_BoMon=$request->bomon;
      // $employee->Id_PhanQuyen=$request->phanquyen;
      // $employee->Id_DonVi=$request->donvi;
      // $employee->Id_TDChuyenMon='1';
      // $employee->Id_NgoaiNgu='1';
      // $employee->Id_TinHoc='1';
      // $employee->Id_ChinhTri='1';
      // $employee->Id_ChucVu=$request->chucvu;
      // $employee->Ho=$request->ho;
      // $employee->Ten=$request->ten;
      // $employee->NgaySinh=date('Y-m-d', strtotime($request->ngaysinh));
      // $employee->GioiTinh=$request->gioitinh;
      // $employee->CMND=$request->cmnd;
      // $employee->DanToc=$request->dantoc;
      // $employee->SDT=$request->sdt;
      // $employee->DiaChi=$request->diachi;
      // $employee->NoiSinh=$request->noisinh;
      // $employee->QueQuan=$request->quequan;
      // $employee->DaVaoDang=$request->davaodang;
      // $employee->BienChe=$request->bienche;
      // $employee->BatDauCongTac=date('Y-m-d H:i:s' , strtotime($request->batdaucongtac));
      // $employee->NgayVaoTruong=date('Y-m-d H:i:s' , strtotime($request->ngayvaotruong));
      // $employee->Email=$request->email;
      // $employee->HinhAnh='';
      // $employee->TrangThai=0;
      // $employee->TenTK=$request->tentk;
      // $employee->MatKhau=$request->matkhau;
      $employee->Ho=$request->ho;
      $employee->Ten=$request->ten;
      $employee->NgaySinh=$request->ngaysinh;
      $employee->GioiTinh=$request->gioitinh;
      $employee->DanToc= $request->dantoc;
      $employee->SDT=$request->sdt;
      $employee->Email=$request->email;
      $employee->NoiSinh=$request->noisinh;
      $employee->CMND= $request->cmnd;
      $employee->DiaChi= $request->diachi;
      $employee->QueQuan= $request->quequan;
        // chúc vụ phòng ban
      $employee->Id_ChucVu= $request->chucvu;
      $employee->Id_PhongBan= $request->phongban;
        // trình độ
      $employee->Id_TDChuyenMon= $request->trinhdochuyenmon;
      $employee->Id_TinHoc= $request->tinhoc;
      $employee->Id_NgoaiNgu= $request->ngoaingu;
      $employee->Id_ChinhTri=$request->chinhtri;
      //  trường
      $employee->Id_DonVi= $request->donvi;
      $employee->Id_BoMon= $request->bomon;
      $employee->BienChe=$request->bienche;
      $employee->DaVaoDang= $request->davaodang;
      $employee->BatDauCongTac= $request->batdaucongtac;
      $employee->Id_ChuyenMon=$request->chuyenmon;
      $employee->NgayVaoTruong=$request->ngayvt;
      // khác
      $employee->TenTK= $request->tentk;
      $employee->MatKhau= $request->matkhau;
      $employee->Id_PhanQuyen=$request->phanquyen;
      $employee->TrangThai= 0;
      $employee->HinhAnh='';
      
       if($employee->save())
       {
               
            // LƯƠNG
            $salary=new  luong;
            $salary->Id_NhanVien=$employee->id;
            $salary->Id_Bac=$request->ngachbac;
            $salary->Ngay=$request->ngayluong;
            $salary->TongNgayLam=0;
            $salary->TongLuong=0;
            $salary->TinhTrang=0;
     
            $salary->save();
            return redirect('/admin/employee')->with('success', 'Thêm nhân viên thành công');
         
       }
       else
       {
           return back()->with('error','Thêm nhân viên thất bại');
       }
    } 
    
    public function pageedit($id)
    {
      // $InfoAdmin=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->get();
      $employee=nhanvien::where(['Id_NhanVien'=> $id])
                        ->with('chucvu')->with('phanquyen')
                        ->with('donvi')->with('bomon')
                        ->with('bomon')->with('chuyenmon')
                        ->with('ngoaingu') ->with('tinhoc')
                        ->with('phongban')
                        ->with('chinhtri')->with('trinhdochuyenmon')
                        ->get(); 
      $listchucvu=chucvu::all();
      $listdonvi=donvi::all();
      $listphongban=phongban::all();
      $listphanquyen=phanquyen::all();
      //  trình độ
      $listtdchuyenmon=tdchuyenmon::all();
      $listtdtinhoc=tinhoc::all();
      $listtdngoaingu=ngoaingu::all();
      $listchinhtri=chinhtri::all();

      $listchuyenmon=chuyenmon::all();
      $listbomon=bomon::all();
      return view('admin.employee.edit', compact('employee','listdonvi','listchucvu','listtdchuyenmon','listtdtinhoc','listtdngoaingu','listchinhtri','listphanquyen','listchuyenmon','listbomon','listphongban'));
    } 
    public function update(Request $request,$id)
    {
      $UpdateEmployee=nhanvien::where(['Id_NhanVien'=> $id])->update([
        // thông tin
        'Ho'=> $request->ho,
        'Ten'=> $request->ten,
        'NgaySinh'=>$request->ngaysinh,
        'GioiTinh'=> $request->gioitinh,
        'DanToc' => $request->dantoc,
        'SDT'=> $request->sdt,
        'Email' => $request->email,
        'NoiSinh' => $request->noisinh,
        'CMND' => $request->cmnd,
        'DiaChi'=> $request->diachi,
        'QueQuan'=> $request->quequan,
          // chúc vụ phòng ban
        'Id_Chucvu'=> $request->chucvu,
        'Id_PhongBan'=> $request->phongban,
          // trình độ
        'Id_TDChuyenMon'=> $request->trinhdochuyenmon,
        'Id_TinHoc'=> $request->tinhoc,
        'Id_NgoaiNgu'=> $request->ngoaingu,
        'Id_ChinhTri'=> $request->chinhtri,
        //  trường
        'Id_DonVi'=> $request->donvi,
        'Id_BoMon'=> $request->bomon,
        'BienChe'=> $request->bienche,
        'DaVaoDang'=> $request->davaodang,
        'BatDauCongTac'=> $request->batdaucongtac,
        'Id_ChuyenMon'=> $request->chuyenmon,
        'NgayVaoTruong'=> $request->ngayvt,
        // khác
        'TenTK'=> $request->tentk,
        'MatKhau'=> $request->matkhau,
        'Id_PhanQuyen'=> $request->phanquyen
      ]);
      if($UpdateEmployee)
      {
        return back()->with('success', 'Sửa thông tin nhân viên thành công');
        // return redirect('admin/employee')->with('success', 'Sửa thông tin thành công');
      }
      else
      {

        return back()->with('error', 'Sửa thông tin nhân viên thất bại');
      }
    } 

    public function destroy($id)
    {
      $employee=nhanvien::where(['Id_NhanVien'=> $id]);
      $xoa=$employee->delete();
      if($xoa)
      {
        return back()->with('success', 'Xóa nhân viên thành công');
      }
      else
      {
        return back()->with('error', 'Xóa nhân viên thất bại');
      }
      
    } 
    public function detailofemployee($id)
    {
      $listchucvu=chucvu::all();
      $listdonvi=donvi::all();
      $listphongban=phongban::all();
      $listphanquyen=phanquyen::all();
      //  trình độ
      $listtdchuyenmon=tdchuyenmon::all();
      $listtdtinhoc=tinhoc::all();
      $listtdngoaingu=ngoaingu::all();
      $listchinhtri=chinhtri::all();

      $listchuyenmon=chuyenmon::all();
      $listbomon=bomon::all();
      $employee=nhanvien::where('Id_NhanVien','=',$id)
                            ->with('chucvu')->with('phanquyen')
                            ->with('donvi')->with('bomon')
                            ->with('bomon')->with('chuyenmon')
                            ->with('ngoaingu') ->with('tinhoc')
                            ->with('phongban')
                            ->with('chinhtri')->with('trinhdochuyenmon')
                            ->get();
      $laudatoryEmployee=khenthuong::where('Id_NhanVien','=',$id)
                            ->get();
      $disciplineEmployee=kyluat::where('Id_NhanVien','=',$id)
                            ->get();
      $salaryEmployees=luong::where('Id_NhanVien','=',$id)
                          ->with('bacluong') 
                          ->get();
      $countDayWork=chamcong::where('Id_NhanVien','=',$id)
                            ->count();
      $totalTime= DB::select("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(GioRa)-TIME_TO_SEC(GioVao)+TIME_TO_SEC(GioBS)+TIME_TO_SEC(GioTangCa))) AS tonggio 
                          From chamcong where Id_NhanVien='$id'");
      $trains=ketquadaotao::where('Id_NhanVien','=',$id)
                          ->with('daotao')
                          ->get();
      $evaluationOfEmployees=danhgia::where('NhanVien','=',$id)->get();
      // dd($discipline);
      return view('admin.employee.detail', compact('trains','evaluationOfEmployees','totalTime','countDayWork','salaryEmployees','employee','laudatoryEmployee','disciplineEmployee','listdonvi',
          'listchucvu','listtdchuyenmon','listtdtinhoc','listtdngoaingu','listchinhtri'
          ,'listphanquyen','listchuyenmon','listbomon','listphongban'));
    }
    public function data()
    {
      // $InfoAdmin=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->get();
      $listemployee=nhanvien::with('phanquyen')
                              ->get();      

      return view('admin.employee.table',compact('listemployee'));
      // return view('admin.employee.index',compact('listemployee'));
    } 
    // public function data()
    // {
    //     $output='';
    //     $employees=nhanvien::with('chucvu')->with('phanquyen')
    //             ->with('donvi')->with('bomon')
    //             ->with('bomon')->with('chuyenmon')
    //             ->with('ngoaingu') ->with('tinhoc')
    //             ->with('phongban')
    //             ->with('chinhtri')->with('trinhdochuyenmon')
    //             ->get();
    //     foreach($employees as $stt =>$employee)
    //     {
    //         $output.='
    //         <tr>
    //               <td style="text-align: center">
    //                   '.++$stt.'
    //               </td>';
    //               if($employee ->HinhAnh == '')
    //               {
    //                 if($employee ->GioiTinh == 'Nam')
    //                 {
    //                   $output.=' <img src="{{ asset("./images/man.jpg")}}"  style="height: 90px;width: 90px" alt="">';
    //                 }
    //                 else
    //                 {
    //                   $output.='<img src="{{ asset("./images/woman.jpg")}}" style="height: 90px;width: 90px" alt="">';
    //                 }
    //               } 
    //               else
    //               {
    //                 $output.='  <img src="{{ asset("./images/"'.$employee ->HinhAnh.') }}"  style="height: 90px;width: 90px" alt="">';
    //               }                 
    //               ;
    //               $output.=' <td style="text-align: center">'.$employee ->Id_NhanVien.'</td>
    //               <td class="align-middle text-left  ">'.$employee ->Ho.' '.$employee ->Ten.'</td>
    //               <td style="text-align: center">'.$employee ->SDT .'</td>
    //               <td style="text-align: center">
    //                   '.$employee->phanquyen->TenQuyen.'                        
    //               </td>
    //               <td class="align-middle text-left " >'.$employee ->Email .'</td>
    //               <td style="text-align: center">';
    //               if ($employee->TrangThai == 1)
    //               {
    //                 $output.='  <span class="badge badge-pill badge-success">Đang hoạt động</span>';
    //               }
    //               else
    //               {
    //                 $output.='  <span class="badge badge-pill badge-danger">Ngừng hoạt động</span>';
    //               }
    //               $output.='       
    //               </td>
    //               <td  style=" text-align: center ">
    //                   <div style="display: flex">
                         
    //                   </div>
    //               </td>
    //           </tr>
    //           ';
    //     }
    //     return response()->json($output);
    // }
}
