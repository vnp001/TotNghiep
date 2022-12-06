<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\loaidaotao;
use App\Models\daotao;
use App\Models\nhanvien;
use App\Models\ketquadaotao;
// use App\

class TrainCotroller extends Controller
{
        // đào tạo
    public function index()
    {
        $trains=daotao::with('loaidaotao')
                        ->orderBy('Id_DaoTao', 'DESC')
                        ->get();
        $typeOfTrains=loaidaotao::all();

        $dateNow=Carbon::now();
        foreach($trains as $train)
        {
            if($train->NgayKetThuc < $dateNow)
            {
                daotao::where('Id_DaoTao','=',$train->Id_DaoTao)
                ->update([
                    'TinhTrang'=>0,
                ]);
            }
            // echo $train->NgayKetThuc;
        }
        return view('admin.train.index',compact('trains','typeOfTrains'));
    }
    public function pagecreatetrain()
    {
        $typeoftrains=loaidaotao::all();
        return view('admin.train.create',compact('typeoftrains'));
    }
    public function storetrain(request $request)
    {
        $train=new daotao;
        $train->Id_LoaiDaoTao=$request->loaidaotao;
        $train->TenDaoTao=$request->tendaotao;
        $train->NoiDung=$request->noidung;
        $train->NgayBatDau=$request->ngaybatdau;
        $train->NgayKetThuc=$request->ngayketthuc;
        $train->NoiDaoTao=$request->noidaotao;
        $train->ChiPhi=$request->chiphi;
        $train->TinhTrang='1';
        
        if($train->save())
        {
            return back()->with('success','Tạo khóa học thành công');
        }
        else
        {
            return back()->with('error','Tạo khóa học thất bại');
        }

    }
    public function detailtrain($id)
    {
        $detailtrains=daotao::where('Id_DaoTao','=',$id)
                            ->with('loaidaotao')
                            ->get();
        $resulTrains=ketquadaotao::where('Id_DaoTao','=',$id)
                                    ->with('daotao')
                                    ->get();
        $resulTrainsOfEmployees=ketquadaotao::where('Id_DaoTao','=',$id)
                                            ->with('nhanvien')
                                            ->get();
        $addEmployees=nhanvien::all();
        return view('admin.train.detail',compact('addEmployees','detailtrains','resulTrains','resulTrainsOfEmployees'));
        
    }
    public function addEmployeeTrain(request $request)
    {
        $add=new ketquadaotao;
        $add->Id_NhanVien=$request->addnhanvien;
        $add->Id_DaoTao=$request->addiddaotao;
        $add->KetQua='';
        $add->GhiChu='';
        if($add->save())
        {
            return back()->with('success','Thêm nhân viên vào đào tạo thành công');
        }
        else
        {
            return back()->with('error','Thêm nhân viên vào khóa học');
        }
    }
    public function pageedittrain($id)
    {
        $typeoftrains=loaidaotao::all();
        $trains=daotao::where('Id_DaoTao',$id)
                        ->get();
        return view('admin.train.edit',compact('typeoftrains','trains'));
    }
    public function updatetrain(request $request,$id)
    {
        $check=0;
        if($request->tinhtrangUD == true)
        {
            $check=1;
        }
        $updatetrains=daotao::where(['Id_DaoTao'=> $id])
            ->update([
            'Id_LoaiDaoTao' =>$request->loaidaotaoUD,
            'TenDaoTao'     =>$request->tendaotaoUD,
            'NoiDung'       =>$request->noidungUD,
            'NgayBatDau'    =>$request->ngaybatdauUD,
            'NgayKetThuc'   =>$request->ngayketthucUD,
            'NoiDaoTao'     =>$request->noidaotaoUD,
            'ChiPhi'        =>$request->chiphiUD,
            'TinhTrang'     =>$check
            ]);
        if($updatetrains)
        {
            return back()->with('success','Cập nhập đào tạo thành công');
        }
        else
        {
            return back()->with('error','Lỗi cập nhập khóa học');
        }
    }
    public function destroytrain($id)
    {
        $train=daotao::where('Id_DaoTao',$id);
        $delete=$train->delete();
        if($delete)
        {
            return back()->with('success','Xóa đào tạo thành công');
        }
        else
        {
            return back()->with('error','Lỗi xóa khóa học');
        }
    }
        // loại đào tạo
    public function typeoftraining()
    {
        $typeoftrains=loaidaotao::all();
        return view('admin.train.typeoftraining.index',compact('typeoftrains'));
    }
    public function storetypeoftraining(request $request)
    {
        $typeoftrain=new loaidaotao;
        $typeoftrain->TenLoaiDaoTao=$request->loaidaotao;
        if($typeoftrain->save())
        {
            return back()->with('success','Lưu loại đào tạo thành công');

        }
        else
        {
            return back()->with('error','Lưu loại đào tạo thất bại');
        }
        
    }
    public function destroytypeoftraining(request $request)
    {
        $destroytypeoftrain=loaidaotao::where(['Id_LoaiDaoTao'=>$request->loaidaotao_id]);
        if($destroytypeoftrain->delete())
        {
            return back()->with('success','Xóa loại đào tạo thành công');
        }
        else
        {
            return back()->with('error','Xóa loại đào tạo thất bại');
        }
    }
    public function edittypeoftraining(request $request)
    {
        $updatetypeoftrain=loaidaotao::where('Id_LoaiDaoTao',$request->idloaivanbanUD)
                                ->update([
                            "TenLoaiDaoTao"=> $request->loaidaotaoUD
                                ]);
        if($updatetypeoftrain)
        {
            return back()->with('success','Sửa loại đào tạo thành công');

        }
        else
        {
            return back()->with('error','Sửa loại đào tạo thất bại');
        }
    }
            // kết quả đào tạo
    public function trainingresults()
    {
        $results=ketquadaotao::with('nhanvien')
                            ->with('daotao')
                            ->get();
        $employees=nhanvien::all();
        $trains=daotao::all();
        return view('admin.train.trainingresults.index',compact('trains','results','employees'));
    }
    public function pagecreateresults()
    {

    }
    public function storeresults(request $request)
    {
        $result=new ketquadaotao;
        if($request->check==1)
        {
            $result->Id_NhanVien=$request->nhanvien;
            $result->Id_DaoTao=$request->iddaotao;
            $result->KetQua='null';
            $result->GhiChu='';
        }
        else
        {
            $result->Id_NhanVien=$request->nhanvien;
            $result->Id_DaoTao=$request->daotao;
            $result->KetQua=$request->ketqua;
            $result->GhiChu=$request->ghichu;
        }
      
        if($result->save())
        {
            return back()->with('success','Thêm nhân viên Vào  đào tạo thành công');
        }
        else
        {
            return back()->with('success','Thêm nhân viên vào đào tạo thất bại');
        }
    }
    public function pageeditresults()
    {
        return view('admin.train.trainingresults.edit');
    }
    public function storedetail(request $request)
    {
        $result=new ketquadaotao;
        $result->Id_NhanVien=$request->nhanvien;
        $result->Id_DaoTao=$request->iddaotao;
        $result->KetQua='';
        $result->GhiChu='';
        if($result->save())
        {
            return back()->with('success','Thêm nhân viên Vào  đào tạo thành công');
        }
        else
        {
            return back()->with('success','Thêm nhân viên vào đào tạo thất bại');
        }
    }
    public function updateresults(request $request)
    {
        $result=ketquadaotao::where('Id_KetQuaDT','=',$request->idketquadaotao)
                        ->update([
                            'Id_NhanVien'=>$request->nhanvienUD,
                            'Id_DaoTao'=>$request->daotaoUD,
                            'KetQua'=>$request->ketquaUD,
                            'GhiChu'=>$request->ghichuUD
                        ]);
        if($result)
        {
            return back()->with('success','Cập nhập kết quả thành công');
        }
        else
        {
            return back()->with('success','cập nhập kết quả thất bại');
        }
    }
    public function destroyresults($id)
    {
        $result=ketquadaotao::where('Id_KetQuaDT','=',$id);
        if($result->delete())
        {
            return back()->with('success','Xóa kết quả nhân viên thành công');
        }
        else
        {
            return back()->with('success','Xóa kết quả nhân viên thất bại');
        }
    }
}
