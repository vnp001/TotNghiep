@extends('userindex')
@section('contentuser')
    
<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-5 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                   
                </div>
                <div class="col-lg-4 mt-2">
                    <h2 style="color: #593bdb">Lương</h2>
                    
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">lương</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 mt-5">
    <div class="card shadow-lg">
        <div class="card-header">
            <div class="col-lg-10">
                <h4>
                    Danh sách lương 
                </h4>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-secondary" href="{{route('reportuser')}}">Báo cáo/ ý kiến</a>
            </div>
        </div>
        <div class="card-content m-2">
            <table  class="DTtable table table-striped table-bordered ml-2" >
                <thead class="text-center text-nowrap "style="background-color: #008bcd;">
                <tr>
                    <th class="w-5 text-white">
                        STT
                    </th>
                    <th class="w-5 text-white">
                        Lương tháng
                    </th>
                    <th class="w-30 text-white">
                        Ngạch
                    </th>
                    <th class="w-10 text-white">
                        Bậc
                    </th>
                    <th class="w-20 text-white">
                        Khen Thưởng
                    </th>
                    <th class="w-25 text-white">
                        Kỹ luật
                    </th>
                    <th class="w-20 text-white">
                        Tổng ngày làm
                    </th>
                    <th class="w-20 text-white">
                        Tổng lương
                    </th>
                </tr>
                </thead>
            <tbody>
            @foreach ($salarys as $stt=> $salary)
                <?php
                    $date = Carbon\Carbon::parse($salary->Ngay);
                    $firstOfMonth = $date->firstOfMonth()->format("Y-m-d");
                    $endOfMonth = $date->endOfMonth()->format("Y-m-d");

                    $employeeSalary=$salary->Id_NhanVien;
                    $totalLaudary=Illuminate\Support\Facades\DB::select("SELECT  SUM(Thuong) AS Thuong FROM khenthuong WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$employeeSalary."'");
                    $totalDiscipline=Illuminate\Support\Facades\DB::select("SELECT  SUM(Phat) AS Phat FROM kyluat WHERE Ngay>='".$firstOfMonth."' AND Ngay <='".$endOfMonth."'AND Id_NhanVien='".$employeeSalary."'");
                ?>
                @if ($salary->TinhTrang == 1)                    
                    <tr>
                        <td class="text-center">
                            {{++$stt}}
                        </td>
                        <td class="text-center">
                            <div class="flex d-flex flex-column">
                                <span>{{'Tháng '.Carbon\Carbon::parse($salary->Ngay)->format('m')}}</span>
                                <span>{{'Năm '.Carbon\Carbon::parse($salary->Ngay)->format('Y')}}</span>
                            </div>
                        </td>
                        <td class="text-left">
                            {{$salary->bacluong->ngach->Ngach}}
                        </td>
                        <td class="text-center">
                            {{$salary->bacluong->TenBac}}
                        </td>
                        <td class="text-center">{{$totalLaudary[0]->Thuong}}</td>
                        <td class="text-center">{{$totalDiscipline[0]->Phat}}</td>
                        <td class="text-center">{{$salary->TongNgayLam}}</td>
                        <td class="text-center">{{$salary->TongLuong}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
