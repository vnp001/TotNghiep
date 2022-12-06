<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
    
use App\Models\luong;
use App\Models\nhanvien;
use App\Models\chamcong;
use App\Models\bac;
use App\Models\ngach;
use App\Models\chucvu;
use App\Models\khenthuong;
use App\Models\kyluat;



class SalaryCotroller extends Controller
{
    public function index()
    {
    //    echo $dateNow = Carbon\Carbon::parse(Carbon::now())->format('Y-m-d');
    //    echo $firstOfMonth = Carbon::now()->firstOfMonth()->format("Y-m-d");
    // //    echo $dateNowtest=new Carbon('2022-05-03')->format("Y-m-d");
    //    echo $dateNowtest=Carbon::parse( new Carbon('2022-05-03'))->format('Y-m-d');
    //    if($dateNow == $firstOfMonth)
    //      {
    //        echo 'true'; 
    //     }
    //    else
    //     {
    //         if($dateNow == $dateNowtest)
    //         {
    //         echo 'true';    
    //         }
    //         else
    //         {
    //             echo 'false';
    //         }
    //     }
    // $levelOfEmployees=luong::where('Id_NhanVien','=','16')
    //                     ->with('bacluong')
    //                     ->get();
        // echo   $levelOfEmployees[0]['bacluong']['TenBac'];
        $now = Carbon::now();
        // $employees=nhanvien::all();
        $firstOfMonth = $now->firstOfMonth()->format("Y-m-d");
        $endOfMonth = $now->endOfMonth()->format("Y-m-d");
        $YearNow=Carbon::parse($now)->format('Y');
        $monthNow=Carbon::parse($now)->format('m');
        $levelOfEmployees=bac::with('ngach')->get();
        // $ngachOfEmployees=ngach::all();
        // $salarys=luong::with('nhanvien')
        //                 ->with('bacluong')
                       
        //                 ->get();
        return view('admin.salary.index',compact('levelOfEmployees','monthNow','YearNow','firstOfMonth','endOfMonth'));
    }
    public function detail($id)
    {
        $levelSalaryOfEmployees=bac::with('ngach')
                                ->with('chucvu')
                                ->get();
        $salaryDetail=luong::where('Id_Luong','=',$id)
                    ->with('nhanvien')
                    ->with('bacluong')
                    ->get();
        $salaryOfEmployees=luong::where('Id_NhanVien','=',$id)
                        ->with('nhanvien')
                        ->with('bacluong')
                        ->get();
        $departments=chucvu::all();
        // echo ($salaryDetail[0]->Id_Bac);
        // echo $levelSalaryOfEmployees[0]->Id;
        return view('admin.salary.detail',compact('departments','salaryDetail','salaryOfEmployees','levelSalaryOfEmployees'));
    }
    public function update($id,request $request)
    {
        if($request->check != 1)
        {
            $salary=luong::where('Id_Luong','=',$id)
            ->update([
                'Id_Bac'=> $request->bac,
                'TongNgayLam'=>$request->tongngaylam,
                'TongLuong'=>$request->tongluong
            ]);
        }
        else
        {
            $salary=luong::where('Id_Luong','=',$id)
            ->update([
                'Id_Bac'=> $request->bacluong
            ]);
            
           
        }
     
        if($salary)
        {
            return back()->with('success','Update xét lương nhân viên thành công');
        }
        else
        {
            return back()->with('error','Update xét lương nhân viên thất bại');
        }
    }
    public function destroy($id)
    {
        $salary=luong::where('Id_Luong','=',$id);
        if($salary->delete())
        {
            return back()->with('success','Update xét lương nhân viên thành công');
        }
        else
        {
            return back()->with('error','Update xét lương nhân viên thất bại');
        }
    }
    public function searchdate(request $request)
    {
        
        $now=new Carbon($request->nam.'-'.$request->thang.'-01');
        $YearNow=$request->nam;
        $monthNow=$request->thang;
        $firstOfMonth = $now->firstOfMonth()->format("Y-m-d");
        $endOfMonth = $now->endOfMonth()->format("Y-m-d");
        $levelOfEmployees=bac::with('ngach')->get();
        return view('admin.salary.index',compact('levelOfEmployees','monthNow','YearNow','firstOfMonth','endOfMonth'));
    }
    public function search(Request $request){
        $output ='';
        if($request->search == null)
        {
            $test2 = khenthuong::all();
            foreach($test2  as  $stt =>$t)
            {
                $output .='
                        <tr>
                            <td class="text-center">'.++$stt.'</td>
                            <td class="text-center">'.$t->Ngay.'</td>
                            <td>'.
                                    $t->MoTa
                                .'
                            </td>
                            <td class="text-center">'.$t->Thuong.'</td>
                        <tr>
                    ';
            }
        }
        $test = khenthuong::where('Ngay','=',$request->search)->get();
        foreach($test as  $stt =>$t)
        {
            $output .='
                        <td class="text-center">'.++$stt.'</td>
                        <td class="text-center">'.$t->Ngay.'</td>
                        <td>'.
                                $t->MoTa
                            .'
                        </td>
                        <td class="text-center">'.$t->Thuong.'</td>
            ';
        }
        return response()->json($output);
	}

    // ngạch bậc
    public function levelofsalary()
    {
        $ngachs=ngach::all();
        $bacs=bac::with('ngach')
                    ->with('chucvu')
                    ->get();
        $listngachs=ngach::all();
        $positions=chucvu::all();
        $levels=bac::all();
        $sumNgach=ngach::count();
        return view('admin.salary.ngachbac.index',compact('sumNgach','positions','listngachs','levels','ngachs','bacs'));
    }
    public function  storengach(request $request)
    {
        $ngach=new ngach;
        $ngach->Mangach=$request->mangach;
        $ngach->Ngach=$request->tenngach;
        $ngach->MoTa=$request->mota;
        
        if($ngach->save())
        {
            return back()->with('success','Cập nhập ngạch thành công');
        }
        else
        {
            return back()->with('error','Cập nhập ngạch thất bại');
        }
    }
    public function  storebac(request $request)
    {
        $bac = new bac;
        $bac->Id_Ngach=$request->ngach;
        $bac->Id_ChucVu=$request->chucvu;
        $bac->TenBac=$request->tenbac;
        $bac->HeSoLuong=$request->hesoluong;
        $bac->LuongCoBan=$request->luongcoban;
        
        
        if($bac->save())
        {
            return back()->with('success','Cập nhập ngạch thành công');
        }
        else
        {
            return back()->with('error','Cập nhập ngạch thất bại');
        }
    }
    public function  updatengach(request $request,$id)
    {
        $updatengach=ngach::where('Id','=',$id)
                    ->update([
               'MaNgach'=>$request->mangachUD,
               'Ngach'=> $request->tenngachUD,
               'MoTa'=> $request->motaUD
                    ]);
        if($updatengach)
        {
            return back()->with('success','Cập nhập ngạch thành công');
        }
        else
        {
            return back()->with('error','Cập nhập ngạch thất bại');
        }
    }
    public function  updatebac(request $request,$id)
    {
        $updatengach=bac::where('Id','=',$id)
                    ->update([
            'Id_Ngach'=>$request->ngachUD,
            'Id_ChucVu'=>$request->chucvuUpdate,
            'TenBac'=>$request->tenbacUD,
            'HeSoLuong'=>$request->hesoluongUD,
            'LuongCoBan'=>$request->luongcobanUD
                    ]);
        if($updatengach)
        {
            return back()->with('success','Cập nhập bậc thành công');
        }
        else
        {
            return back()->with('error','Cập nhập bậc thất bại');
        }
    }
    public function  destroyngach($id)
    {
        $destroyngach=ngach::findOrFail($id);
        if($destroyngach->delete())
        {
            return back()->with('success','Xóa ngạch thành công');
        }
        else
        {
            return back()->with('error','Xóa ngạch thất bại');
        }
    }
    public function  destroybac($id)
    {
        $destroybac=bac::findOrFail($id);
        if($destroybac->delete())
        {
            return back()->with('success','Xóa ngạch thành công');
        }
        else
        {
            return back()->with('error','Xóa ngạch thất bại');
        }
    }
 
}
