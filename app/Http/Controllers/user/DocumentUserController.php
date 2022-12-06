<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\vanban;
use App\Models\nhanvien;
use App\Models\loaivanban;

class DocumentUserController extends Controller
{
    public function index_user()
    {
        $documents=vanban::with('loaivanban')
                        ->with('nhanvien')
                        ->orderBy('Ngay','desc')
                        ->get();
        $now = Carbon::now();
        // $employees=nhanvien::all();
        $firstOfMonth = $now->firstOfMonth()->format("Y-m-d");
        $endOfMonth = $now->endOfMonth()->format("Y-m-d");
        $YearNow=Carbon::parse($now)->format('Y');
        $monthNow=Carbon::parse($now)->format('m');
        $search=0;
        return view('user.document.index',compact('search','YearNow','monthNow','documents'));
    }
    public function search(request $request)
    {
        $year=$request->nam;
        $month=$request->thang;
       
        $date=new Carbon($year.'-'.$month.'-'.'01');
        $firstOfMonth = $date->firstOfMonth()->format("Y-m-d");
        $endOfMonth = $date->endOfMonth()->format("Y-m-d");
        $search=1;
        $documents=vanban::with('loaivanban')
                        ->with('nhanvien')
                        ->orderBy('Ngay','desc')
                        ->get();
        $resulsDoc=vanban::where('Ngay','>=',$firstOfMonth)
                        ->where('Ngay','<=',$endOfMonth)
                        ->with('loaivanban')
                        ->with('nhanvien')
                        ->orderBy('Ngay','desc')
                        ->get();
        $yearsearch=$request->nam;
        $monthsearch=$request->thang;
        return view('user.document.index',compact('yearsearch','monthsearch','resulsDoc','search','documents'));
    }
    public function detail_user($id)
    {
        $doc=vanban::where(['Id_VanBan'=> $id])
                    ->with('nhanvien')
                    ->get();
        return view('user.document.detail',compact('doc')); 
    }
}
