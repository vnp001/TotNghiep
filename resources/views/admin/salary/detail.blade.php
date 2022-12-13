@extends('index')
@section('content')
@foreach ($salaryDetail as $detail)
<div class="mr-1 ml-1">    
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>
                <h3>Chi tiết lương nhân viên: {{ Illuminate\Support\Str::lower($detail->nhanvien->Ho.' '.$detail->nhanvien->Ten)}}</h3>
            </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('laudatory')}}">lương</a></li>
                <li class="breadcrumb-item active"><a href="">Chi tiết</a></li>
            </ol>
        </div>
    </div>
    @if ( Session::has('success') )
    <div class="alert mb-3 alert-primary alert-dismissible alert-alt solid fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif


    @if ( Session::has('error') )
        <div class="alert mb-3 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-content">
                    <div class="row mt-1 mb-1">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-5 mt-5">
                                    <img src="{{ asset('./images/'.$detail->nhanvien->HinhAnh)}}" width="220" height="220" class="rounded-circle" alt="">
                                </div>
                                <div class="col-lg-7 mt-5" style="border-right: 2px dashed #ccc;">
                                    <h4 class="mt-2">{{$detail->nhanvien->Ho.' '.$detail->nhanvien->Ten}}</h4>
                                    <h7 class="">Phòng ban :{{' '.$detail->nhanvien->phongban->TenPhongBan}}</h7><br>
                                    <h7 class="">Chức vụ :{{' '.$detail->nhanvien->chucvu->TenChucVu}}</h7>
                                    <h5 class="mt-3">Mã nhân viên :{{' '.$detail->nhanvien->Id_NhanVien}}</h5>
                                    <h7>Ngày vào trường :{{' '.\Carbon\Carbon::parse($detail->nhanvien->NgayVaoTruong)->format('d-m-Y')}}</h7><br>
                                    <h7 class="mt-2">Bắt đầu công tác:{{' '.\Carbon\Carbon::parse($detail->nhanvien->BatDauCongTac)->format('d-m-Y')}}</h7>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 w-auto ml-3">
                            <ul class="mt-2">
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Chuyên môn :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->nhanvien->chuyenmon->TenChuyenMon}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Bộ môn :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->nhanvien->bomon->TenBoMon}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Đơn vị :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->nhanvien->donvi->TenDonVi}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Mã ngạch :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->bacluong->ngach->MaNgach}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Ngạch :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->bacluong->ngach->Ngach}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Bậc :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->bacluong->TenBac}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Hệ số lương :
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->bacluong->HeSoLuong}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Hệ số phụ cấp
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->nhanvien->chucvu->HeSoPhuCap}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            Lương cơ bản
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->bacluong->LuongCoBan}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col ml-3 text-right flex-wrap flex-column d-flex">
                            <a href="{{route('detailemployeesalary',['id'=>$detail->nhanvien->Id_NhanVien])}}" style="color: black">Thông tin chi tiết</a>
                            <a href="" style="color: black" data-toggle="modal" data-target="#xetluong">Xét lương</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $lautory=App\Models\khenthuong::where('Id_NhanVien','=',$detail->Id_NhanVien)
                        ->with('nhanvien')
                        ->get();
        $discipLine=App\Models\kyluat::where('Id_NhanVien','=',$detail->Id_NhanVien)
                        ->with('nhanvien')
                        ->get();
    ?>
    <div class="row">
        <div class="col">
            <div class="flex-wrap flex-column d-flex">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Khen thưởng 
                    </div>
                    <div class="card-content mr-2 mt-2 ml-2">
                        <table class="table table-striped table-bordered"  >
                            <thead class="text-center text-nowrap thead-light">
                                <tr>
                                    <th class="w-5">Stt</th>
                                    <th class="w-15">Ngày</th>
                                    <th class="w-30">Mô tả</th>
                                    <th class="w-10">Thưởng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($lautory->isEmpty())
                                    <tr>
                                        <td rowspan="4">
                                          hiện tại nhân viên chưa được khen thưởng  
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($lautory as $stt => $lautoryEmployee)
                                        <tr>
                                            <td class="text-center">{{++$stt}}</td>
                                            <td class="text-center">{{\Carbon\Carbon::parse($lautoryEmployee->Ngay)->format('d-m-Y')}}</td>
                                            <td>
                                                <?php 
                                                $string = preg_replace("/&nbsp;/",'',$lautoryEmployee->MoTa);
                                                echo $string;
                                                ?>
                                            </td>
                                            <td class="text-center">{{$lautoryEmployee->Thuong}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card shadow-lg">
                    <div class="card-header">
                        kỉ luật
                    </div>
                    <div class="card-content mr-2 mt-2 ml-2">
                        <table class="table table-striped table-bordered">
                            <thead class="text-center text-nowrap thead-light">
                                <tr>
                                   <th class="w-5">Stt</th>
                                   <th class="w-15">Ngày</th>
                                   <th class="w-30">Lý do</th>
                                   <th class="w-10">phạt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($discipLine->isEmpty())
                                    <tr>
                                        <td rowspan="4">
                                          hiện tại nhân viên chưa bị kỹ luật 
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($discipLine as $stt=> $discipLineEmployee)
                                        <tr>
                                            <td class="text-center">{{++$stt}}</td>
                                            <td class="text-center">{{\Carbon\Carbon::parse($discipLineEmployee->Ngay)->format('d-m-Y')}}</td>
                                            <td>
                                                <?php 
                                                $string = preg_replace("/&nbsp;/",'',$discipLineEmployee->MoTa);
                                                echo $string;
                                                ?>
                                            </td>
                                            <td class="text-center">{{$discipLineEmployee->Thuong}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="col">
                        Thống kê lương
                    </div>
                </div>
                <div class="card-content">
                    <ul class="ml-4">

                        <?php
                             $salaryEmployees=App\Models\luong::where('Id_NhanVien','=',$detail->Id_NhanVien)
                                                    ->with('nhanvien')
                                                    ->with('bacluong')
                                                    ->get();
                            ?>
                        <table class="form-group  table table-striped table-bordered" style="width: auto;" >
                            <thead class="text-center text-nowrap thead-light">
                              <tr>
                                <th class="w-5">Stt</th>
                                <th class="w-15">Tháng/năm</th>
                                <th>Ngạch</th>
                                <th>Bậc</th>
                                <th class="w-30">Tổng ngày làm</th>
                                <th class="w-10">Lương tháng</th>
                              </tr>
                          </thead>
                          <tbody id="listdata">
                            @foreach ($salaryEmployees as $stt => $salary)
                            <tr>
                                <td class="text-center">{{++$stt}}</td>
                                <td class="text-center">
                                    {{
                                    'Tháng'.Carbon\Carbon::parse($salary->Ngay)->format('m').' Năm'.Carbon\Carbon::parse($salary->Ngay)->format('Y')
                                    }}
                                </td>
                                <td class="text-center">{{$salary->bacluong->Id_Ngach}}</td>
                                <td class="text-center">{{$salary->bacluong->TenBac}}</td>
                                <td class="text-center">{{$salary->TongNgayLam}}</td>
                                <td class="text-center">{{$salary->TongLuong}}</td>
                            </tr>
                        @endforeach
                          </tbody>
                      </table>

                        @if ($salaryDetail->isEmpty())
                         <li class="mt-3"><p>Hiện tại nhân viên chưa bị kỹ luật</p></li>
                        @else
                            @foreach ($salaryDetail as $salary)
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            {{-- <p style="color: #616161;" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($disciplineDetail->Ngay)->format('d/ m/ Y')}}</p> --}}
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="text-left" >
                                                <?php 
                                                    // $string = preg_replace("/&nbsp;/",'', $disciplineDetail->MoTa);
                                                    // echo $string;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Xét lương-->
  <form  method="post" action="{{route('updatesalary',['id'=>$detail->Id_Luong])}}">
    @csrf
  
    <div class="w-50 d-flex justify-content-end">
    <div class="modal fade" id="xetluong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
            <div class="modal-content p-3" style="width: 550px;">
                <div class="flex-row d-flex justify-content-center mb-2">
                    <h2 class="text-info">Xét Lương </h2>
                </div>
               
                <input type="hidden" name="check" value="1">
                <div class="form-row mt-2 ml-2" style="display: flex">
                    <label class="my-auto mr-3"> Nhân viên :</label>      
                    @if ($detail->nhanvien->HinhAnh == '')
                            @if ($detail ->nhanvien->GioiTinh == 'Nam')
                            <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                    @else
                        <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                    @endif
                    @else
                        <img class="ml-5" src="{{ asset('./images/' . $detail->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                    @endif
                    <p class="ml-3 mt-2">
                        {{$detail->nhanvien->Ho.' '.$detail->nhanvien->Ten}}
                    </p>    
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label >Chức vụ</label>
                        <input type="text" name="chucvu" class="form-control" placeholder="Địa chỉ"  name="diachi" disabled value="{{$detail->nhanvien->chucvu->TenChucVu}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Hệ số phù cấp</label>
                        <input type="text" class="form-control" placeholder="Địa chỉ"  name="diachi" disabled value="{{$detail->nhanvien->chucvu->HeSoPhuCap}}" required>
                    </div>
                </div>
                <div class="d-flex text-left mb-2 mt-4 align-items-center">
                    <div class="w-15 pl-2 mr-2">
                        <label class="my-auto">Ngạch - Bậc</label>
                      </div>
                      <div class="w-70">
                        <select name="bacluong" class="form-control" id="remain-open" >
                            <option value="">Chọn ngạch bậc</option>
                            @foreach ($levelSalaryOfEmployees as $levelSalaryOfEmployee)
                                @if ($detail->Id_Bac == $levelSalaryOfEmployee->Id)
                                    <option selected value="{{$levelSalaryOfEmployee->Id}}">{{$levelSalaryOfEmployee->ngach->Ngach.' - '.$levelSalaryOfEmployee->TenBac}}</option>
                                @else
                                    <option value="{{$levelSalaryOfEmployee->Id}}">{{$levelSalaryOfEmployee->ngach->Ngach.' - '.$levelSalaryOfEmployee->TenBac}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end my-0 mt-4">
                        <div class="w-25 mr-2"></div>
                        <div class="w-75 d-flex">
                            <input type="submit" name="btn" class="btn btn-success w-40" value="Xét lương">
                            <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>    

<!-- END xét lương -->

        {{-- <script type="text/javascript">
            $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '/admin/salary/search',
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
            }
            });
            })
            </script> --}}
<script type="text/javascript">
    // $('#search').on('keyup',function(){
        $("#search").on('change', function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '/admin/salary/search',
            data:{
                    'search':$value,
                },
            dataType: 'json', 
            encode  : true,
                success:function(data){
                    $('#listdata').html(data);
                    console.log("sucess");
                },
                error:function(){ 
                        console.log("Error!!!!");
                }
            
            });
        });

    // $(document).ready(function(){
    //     $(document).on('keyup','#keyword',function(){
    //         var keyword=$(this).val();
    //         $.ajax({
    //             type: "get", 
    //             url: "admin/salary/findProductName",
    //             data: {
    //                 keyword: keyword
    //             },
    //             dataType: "dataType",
    //             success: function (response) {
    //                 $('#listUser').html(response)
    //             },
    //             error:function(){ 
    //                     console.log("Error!!!!");
    //             }
    //         });
    //     });
    // });
</script> 
@endforeach

@endsection