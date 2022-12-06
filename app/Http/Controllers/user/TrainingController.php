<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\daotao;
use App\Models\ketquadaotao;

class TrainingController extends Controller
{
    public function index()
    {
        $resuftTrains=ketquadaotao::where('Id_NhanVien','=',session()->get('user_id'))
                            ->with('daotao')
                            ->get();
        $trains=daotao::where('TinhTrang','=','1')
                        ->with('loaidaotao')
                        ->get();
        $checkJoin=ketquadaotao::where('Id_NhanVien','=',session()->get('user_id'))
                        ->where('Id_DaoTao','=',1)
                        ->with('daotao')
                        ->get();
      
        return view('user.training.index',compact('trains','resuftTrains'));
    }
    public function regist(request $request)
    {
        $resuftTrain=new ketquadaotao;
        $resuftTrain->Id_NhanVien=session()->get('user_id');
        $resuftTrain->Id_Daotao=$request->khoadaotao;
        $resuftTrain->KetQua='';
        $resuftTrain->GhiChu='';

        if($resuftTrain->save())
        {    
            return back()->with('success','Bạn đã đăng kí khóa đào tạo thành công');
        }
        else
        {
            return back()->with('error','Bạn đã đăng kí khóa đào tạo thất bại');
        } 
    }
    public function removeregist($id)
    {
        $removeRegistry=ketquadaotao::where('Id_KetQuaDT','=',$id);
        if($removeRegistry->delete())
        {    
            return back()->with('success','Bạn đã hủy đăng kí  khóa học thành công');
        }
        else
        {
            return back()->with('error','Bạn đã hủy đăng kí khóa học thất bại');
        } 
    }
}
