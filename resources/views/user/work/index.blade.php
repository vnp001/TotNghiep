@extends('userindex')
@section('contentuser')
<div>
    <button>test</button>
    <i class="mdi mdi-arrow-left-bold-circle-outline"></i>
</div>
<div class="col-lg-9 col-sm-6 " style="">
    <div class="row ml-2">
        <h4>Công việc đang xử lý</h4>
        <table class="table  table-bordered" >
            <thead class="text-center " style="background-color: #5112d4;color:white;">
            <tr>
                <th class="w-10">
                    Thứ ngày
                </th>
                <th class="w-10">
                    Thời gian
                 </th>
                <th class="w-40">
                    Nội dung
                </th>
                <th class="w-30">
                    Thành phần
                </th>
                <th class="w-15">
                    Địa điểm
                </th>
                {{-- <th class="w-15">
                    Chủ trì
                </th> --}}
            </tr>
            </thead>
            <tbody>
                {{-- @foreach ($work as $datework) --}}
                    
                        <?php 
                                for($i = $weekStartDate; $i <= $weekEndDate; $i->modify('+1 day'))
                                {
                                    foreach($employees as $employee)
                                    {
                                        $count=App\Models\lichlamviec::where('Id_PhongBan','=', $employee->Id_PhongBan)
                                                                    ->where('Ngay','=',$i->format('Y-m-d'))
                                                                    ->count();
                                        ?>
                                        <tr>
                                            <td 
                                                style="text-align: center"
                                                <?php
                                                    if($count!= null)
                                                    {
                                                        ?>rowspan="<?php echo $count?>"<?php
                                                    }  
                                                         
                                                ?>
                                            >
                                            <div >
                                                <?php 
                                                    echo Carbon\Carbon::parse($i)->format('l');
                                                ?>
                                            </div>
                                            <div >
                                                <?php 
                                                    echo Carbon\Carbon::parse($i)->format('d-m-Y');
                                                ?>
                                            </div> 
                                            </td>
                                        <?php
                                        $calendarWork=App\Models\lichlamviec::where('Id_PhongBan','=', $employee->Id_PhongBan)
                                                                ->where('Ngay','=',$i->format('Y-m-d'))
                                                                // ->where('Ngay','<=',$weekEndDate)
                                                                ->get();
                                        if($count == null)
                                        {
                                            ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php
                                        }
                                        else {
                                            foreach($calendarWork as $work)
                                                {
                                                    if($work != null)
                                                    {
                                                        ?>
                                                            <td style="text-align: center"><?php echo \Carbon\Carbon::parse($work->ThoiGian)->format('H : m') ?></td>
                                                            <td><?php echo $work->NoiDung?></td>
                                                            <td><?php echo $work->ThanhPhan?></td>
                                                            <td style="text-align: center"><?php echo $work->DiaDiem?></td>
                                                        <?php
                                                    }
                                                ?>  
                                                </tr>
                                            <?php
                                            }
                                        }
                                        // echo 'so cong viec'. $count;
                                    }
                                }
                        ?>
                        {{-- @foreach ($calendarWork as $work)
                        <td>
                            {{ $work->ThoiGian}}
                        </td>
                        <td>
                            {!! $work->NoiDung !!}
                        </td>
                        <td>
                            {{ $work->ThanhPhan}}
                        </td>
                        <td>
                            {{ $work->DiaDiem}}
                        </td>
                        <td>
                            {{ $work->NguoiChuTri }}
                        </td>
                        @endforeach --}}
                   
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

<div class="col-lg-3 col-sm-6  " >
    <div class="card shadow-lg" style="border: 1px solid #3a5580;">
        <div class="card-header" style="background-color: #3a5580">
            <dt class="text-white">Nhân viên khen thưởng trong tháng</dt>
        </div>
        <div class="card-body" style="height: 300px;">
            <ul>  
                @foreach ($employeeLaudatory as $laudatory)             
                <li class="ml-5" style="font-size: 25px">
                    {{$laudatory->nhanvien->Ho.' '.$laudatory->nhanvien->Ten}}
                </li>
                @endforeach

            </ul>
          
            
            
        </div>
    </div>
    <div class="card shadow-lg" style="border: 1px solid #3a5580;">
        <div class="card-header" style="background-color: #3a5580">
            <dt class="text-white">Nhân viên bị kỉ luật trong tháng</dt>
        </div>
        <div class="card-body" style="height: 300px;">
            <ul>
                 @foreach ($employeeDiscipline as $discipline)
                <li class="ml-5" style="font-size: 25px">
                    {{$discipline->nhanvien->Ho.' '.$discipline->nhanvien->Ten}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection