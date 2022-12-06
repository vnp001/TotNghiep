@extends('index')
@section('content')
<!-- Tiêu đề -->
<div class="mr-1 ml-1">    
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>
                Danh sách lương nhân viên
            </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('laudatory')}}">lương</a></li>
                {{-- <li class="breadcrumb-item active"><a href="{{route('laudatory')}}">khen thưởng</a></li> --}}
            </ol>
        </div>
    </div>
@if ( Session::has('success') )
    <div class="alert mb-3 alert-primary solid alert-right-icon alert-dismissible fade show">
        <span><i class="mdi mdi-account-search"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button> {{ Session::get('success') }}
    </div>
@endif


@if ( Session::has('error') )
    <div class="alert mb-3 alert-danger solid alert-dismissible fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif

<?php
            // $now = \Carbon\Carbon::now();
            // $MonthNow =\Carbon\Carbon::parse($now)->format('m');
            // $year=\Carbon\Carbon::parse($now)->format('Y');
?>
    <div class="row " style="margin-top: -25px; ">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <form action="{{route('searchsalary')}}" method="POST">
                    @csrf
                <div class="card-header">
                    <div class="col-lg-2">
                      <h4>Lương</h4>                     
                    </div>
                    <div class="col-lg-2">
                      <?php
                        // $now = \Carbon\Carbon::now();
                        // $MonthNow =\Carbon\Carbon::parse($now)->format('m');
                        // $year=\Carbon\Carbon::parse($now)->format('Y');
                        // $yearNow=\Carbon\Carbon::parse($now)->format('Y');
                      
                          ?>
                      <select name="thang" class="form-control" required>
                        <option  value="">Chọn tháng</option> 
                        <?php
                        for($i=1;$i<=12;$i++)
                        {
                          ?>
                            @if ($monthNow == $i)
                              <option selected value="<?php echo $i?>">Tháng <?php echo $i?></option>  
                            @else
                              <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                            @endif
                          <?php
                        }
                        ?>
                      </select>
                      </div>
                      <div class="col">
                      <select class="form-control" name="nam" required>
                        <option  value="">Chọn năm</option>
                        <?php
                          for ($year = (int)date('Y'); 1900 <= $year; $year--)
                          { 
                            ?>
                              @if ($YearNow == $year)
                              <option selected value="<?php echo $year?>">Năm <?php echo $year;?></option>
                            @else
                                <option value="<?php echo $year?>">Năm <?php echo $year;?></option>
                            @endif
                           <?php
                         }
                          ?>
                       </select>
                      </div>
                    <div class="col-lg-5">
                      <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn btn-secondary">Tìm kiếm</button>
                    </div>
                </div>
                </form>
                <div class="card-content">
                    <div class=" ml-2 mr-2 mt-2 " style="margin-bottom:30px;" >
                        <table class="form-group  table table-striped table-bordered" style="width: 100%;" >
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-10">
                                Ảnh
                             </th>
                            <th class="w-15">
                                Họ Tên
                            </th>
                            <th>
                                Ngạch
                            </th>
                            <th>
                                Bậc
                            </th>
                            {{-- <th class="w-10">
                                Hệ số lương
                            </th>
                            <th class="w-10">
                                Hệ số phụ cấp
                            </th>
                            <th class="w-10">
                                Lương cơ bản
                            </th> --}}
                            <th class="w-10">
                                Tổng Ngày
                            </th>
                            <th class="w-10">
                                Thưởng/Phạt 
                            </th>
                            <th class="w-10">
                                Tăng ca 
                            </th>
                            <th class="w-15">
                                Tiền lương
                            </th>
                            <th class="w-5">
                            </th>
                        </tr>
                        </thead>
                    <tbody>
                        
                        <?php 
                             $salarys=App\Models\luong::where('Ngay','>=',$firstOfMonth)
                                        ->where('Ngay','<=',$endOfMonth)
                                        ->with('nhanvien')
                                        ->with('bacluong')
                                        ->get();
                            ?>
                       @foreach ($salarys as $stt => $salary)
                           <tr>
                               <td style="text-align: center">
                                    {{++$stt}}
                               </td>
                               <td style="text-align: center">
                                    @if ($salary->nhanvien->HinhAnh == '')
                                        @if ($salary->nhanvien->GioiTinh == 'Nam')
                                            <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                                        @else
                                            <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('./images/' . $salary->nhanvien->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                                    @endif
                                </td>
                               <td style="text-align: center">
                                   <a href="{{ route('detailsalary',['id' =>$salary->Id_Luong])}}" style="">{{$salary->nhanvien->Ho.' '.$salary->nhanvien->Ten}}</a> 
                               </td>
                               <td class="text-center">
                                    {{$salary->bacluong->ngach->MaNgach}}
                               </td>
                               <td class="text-center">
                                    {{$salary->bacluong->TenBac}}
                               </td>
                               <td style="text-align: center">
                                    {{$salary->TongNgayLam}}
                               </td>
                               <td style="text-align: center">
                                    {{$salary->TienKTKL}}
                                </td>
                                <td></td>
                                <td style="text-align: center">
                                    {{$salary->TongLuong}}/VNĐ
                                </td>
                                <td class="text-right mr-3">
                                    <div class="dropdown dropdown-action">
                                        <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('detailsalary',['id'=>$salary->Id_Luong])}}" ><i class="mdi mdi-account-box-outline"></i> Chi Tiết</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary-{{$salary->Id_Luong}}"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                            <a class="dropdown-item" href="{{route('destroysalary',['id'=>$salary->Id_Luong])}}"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                        </div>
                                    </div>
                                </td>
                           </tr>

                    <!-- START MODEL lương-->
                    <div class="w-50 d-flex justify-content-end">
                        <div class="modal fade" id="edit_salary-{{$salary->Id_Luong}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                {{-- START FORM --}}
                                <form  method="post" action="{{route('updatesalary',['id'=>$salary->Id_Luong])}}">
                                    @csrf

                                    <div class="modal-content p-3" style="width: 550px;">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Lương</h2>
                                        </div>
                                            <input type="hidden" name="idluong" value="{{$salary->Id_Luong}}" class="form-control"  />
                                            <div class="d-flex flex-column w-auto mt-3">
                                                <div class="w-auto pl-2 mr-2">
                                                    <h4 class="">Tháng {{Carbon\Carbon::parse($salary->Ngay)->format('m')}} Năm {{Carbon\Carbon::parse($salary->Ngay)->format('Y')}}</h4>
                                                    {{-- <label class="my-auto"></label> --}}
                                                </div>
                                            </div> 
                                            <div class="d-flex flex-column w-auto mt-3">
                                                <div class="w-auto pl-2 mr-2">
                                                    <label class="my-auto">Nhân viên:<img class="ml-5" src="{{ asset('./images/' . $salary->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt=""> {{' ' .$salary->nhanvien->Ho.' '.$salary->nhanvien->Ten}} </label>
                                                </div>
                                            </div>  
                                            {{-- <div class="d-flex text-left mb-2 align-items-center">
                                                <div class="w-15 pl-2 mr-2 mt-4">
                                                    <label class="my-auto">Ngạch</label>
                                                </div>
                                                <div class="w-70">
                                                   <select name="ngach"class="form-control" id="">
                                                        <option value="">--Chọn ngạch--</option>
                                                        @foreach ($ngachOfEmployees as $ngachOfEmployee)
                                                            @if ($ngachOfEmployee->Id == $salary->bacluong->Id_Ngach)
                                                                <option selected value="{{$ngachOfEmployee->Id}}">{{$ngachOfEmployee->MaNgach.' '.$ngachOfEmployee->Ngach}}</option>
                                                            @else
                                                                <option value="{{$ngachOfEmployee->Id}}">{{$ngachOfEmployee->MaNgach.' '.$ngachOfEmployee->Ngach}}</option>
                                                            @endif
                                                            
                                                        @endforeach
                                                   </select>
                                                </div>
                                               
                                              </div> --}}
                                              <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                <div class="w-15 pl-2 mr-2">
                                                    <label class="my-auto">Bậc</label>
                                                  </div>
                                                  <div class="w-70">
                                                      <select name="bac"class="form-control" id="">
                                                          <option value="">--ngach--bậc</option>
                                                          @foreach ($levelOfEmployees as $levelOfEmployee)
                                                              @if ($levelOfEmployee->Id == $salary->bacluong->Id)
                                                                  <option selected value="{{$levelOfEmployee->Id}}">{{$levelOfEmployee->ngach->Ngach.' - '.$levelOfEmployee->TenBac}}</option>
                                                              @else
                                                                <option  value="{{$levelOfEmployee->Id}}">{{$levelOfEmployee->ngach->Ngach.' - '.$levelOfEmployee->TenBac}}</option>
                                                              @endif
                                                          @endforeach
                                                      </select>
                                                  </div>
                                                </div>
                                              <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-40 pl-2 mr-2">
                                                        <label class="my-auto">Tổng ngày làm</label>
                                                    </div>
                                                    <div class="w-50">
                                                        <input type="text" name="tongngaylam" class="form-control" value="{{$salary->TongNgayLam}}">
                                                    </div>
                                                    <div class="w-40 pl-2 mr-2 ml-4">
                                                    <label class="my-auto">Tổng lương</label>
                                                    </div>
                                                    <div class="w-50">
                                                        <input type="text" name="tongluong" class="form-control" value="{{$salary->TongLuong}}">
                                                    </div>
                                              </div>
                                            <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                <div class="w-10 mr-2"></div>
                                                <div class="w-75 d-flex">
                                                    <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                    <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- END FORM --}}
                            </div>
                        </div>
                    </div>
                    <!-- END MODEL lương-->

                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<script type="text/javascript">
    // $(document).ready( function(){
    //     const ngaythangnam = document.getElementById("#ngaythangnam");
    //     $thang=$('#thang').val();
    //     $nam=$("#nam").val();
    //     ngaythangnam.on('change',function(){
    //         // e.target.matches("option")
    //             console.log(thang.val())
    //             console.log(nam.val())

    //     });
    // $(document).on('change','.selectthangnam', function(){
    //   $thang=$('#thang').val();
    //   $nam=$("#nam").val();
    //   $.ajax({
    //       type : 'get',
    //       url : '/admin/timekeeping/Search',
    //       data:{
    //               'thang':$thang,
    //               'nam':$nam
    //           },
    //       dataType: 'json', 
    //       encode  : true,
    //           success:function(data){
    //               $('#listdatatimekeeping').html(data);
    //               console.log("sucess");
    //           },
    //           error:function(){ 
    //                   console.log("Error!!!!");
    //           }
          
    //       });
    //   });
</script>
@endsection