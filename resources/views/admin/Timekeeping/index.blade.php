@extends('index')
@section('content')   
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3> Chấm công nhân viên</h3>
        </div>
      
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('timekeeping')}}">chấm công</a></li>
                {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> --}}
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
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
    <!-- form hiển thị dữ liệu -->
      <div class="row">
          <div class="col-lg-12">
            <div class="card shadow-lg">
              <form action="{{route('timekeepingsearch')}}" method="post">
                @csrf
              <div class="card-header">
                  <div class="col-lg-2">
                    <h4>Chấm công</h4>                     
                  </div>
                  <?php
                  $now = \Carbon\Carbon::now();
                  $MonthNow =\Carbon\Carbon::parse($now)->format('m');
                  // $year=\Carbon\Carbon::parse($now)->format('Y');
                  $yearNow=\Carbon\Carbon::parse($now)->format('Y');
                    ?>
                  @if ($search == 1)
                  <div class="col-lg-2">
                    <select name="thang" class="form-control" required>
                      <option  value="">Chọn tháng</option>
                        @for($i=1;$i<=12;$i++)
                          @if ($monthsearch == $i)
                            <option selected value="<?php echo $i?>">Tháng <?php echo $i?></option>  
                          @else
                            <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                          @endif
                      @endfor
                    </select>
                    </div>
                    <div class="col">
                    <select class="form-control" name="nam" required>
                      <option  value="">Chọn năm</option>
                      @for($year = (int)date('Y'); 1900 <= $year; $year--)
                        @if ($yearsearch == $year)
                          <option selected value="<?php echo $year?>">Năm <?php echo $year;?></option>
                        @else
                            <option value="<?php echo $year?>">Năm <?php echo $year;?></option>
                        @endif
                      @endfor
                     </select>
                    </div>
                  @else
                    <div class="col-lg-2">
                      <select name="thang" class="form-control" required>
                        <option  value="">Chọn tháng</option>
                          @for($i=1;$i<=12;$i++)
                            @if ($MonthNow == $i)
                              <option selected value="<?php echo $i?>">Tháng <?php echo $i?></option>  
                            @else
                              <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                            @endif
                        @endfor
                      </select>
                      </div>
                      <div class="col">
                      <select class="form-control" name="nam" required>
                        <option  value="">Chọn năm</option>
                        @for($year = (int)date('Y'); 1900 <= $year; $year--)
                          @if ($yearNow == $year)
                            <option selected value="<?php echo $year?>">Năm <?php echo $year;?></option>
                          @else
                              <option value="<?php echo $year?>">Năm <?php echo $year;?></option>
                          @endif
                        @endfor
                      </select>
                      </div>
                  @endif
                  <div class="col-lg-5">
                    <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn btn-secondary">Tìm kiếm</button>
                  </div>
              </div>
              </form>
              <form action="{{ route('createtimekeeping')}}" method="post">
                @csrf
              <div class="card-content">
                <div class="d-flex text-left mb-2 mt-2 mr-2 ml-2 align-items-center">
                  <div class="w-20 pl-2 mr-2">
                      <label class="my-auto">Nhân viên</label>
                  </div>
                  <div class="w-40">
                      <select name="nhanvien" id="remain-open"class="form-control"required>
                        <option value="">Mã nhân viên - Tên nhân viên - phòng</option>
                        @foreach ($employees as $employee)
                          @if ($employee->Id_PhanQuyen == "1")
                            <option disabled value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien.' - '.$employee->Ho.' '.$employee->Ten.' - '.$employee->phongban->TenPhongBan}}</option>
                          @else
                            <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien.' - '.$employee->Ho.' '.$employee->Ten.' - '.$employee->phongban->TenPhongBan}}</option>
                          @endif
                        @endforeach
                      </select>
                  </div>
                  <div class="w-5 pl-2 mr-2 ml-5">
                    <label class="my-auto">Ngày</label>
                  </div>
                  <div class="w-40">
                      <input type="date"  class="form-control" value="{{\Carbon\Carbon::parse($now)->format('Y-m-d')}}" name="ngay"  required/>
                  </div>
                  <div class="w-40 ml-5">
                    <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Chấm công</button>
                  </div>
                </div>
                <div class="d-flex text-left mb-2 mt-2 mr-2 ml-2 align-items-center">
                  <div class="w-20 pl-2 mr-2">
                      <label class="my-auto">Giờ Vào</label>
                  </div>
                  <div class="w-40">
                    <input type="time"  class="form-control"name="giovao"  />
                  </div>
                  <div class="w-10 pl-2 mr-2 ml-5">
                    <label class="my-auto">Giờ ra</label>
                  </div>
                  <div class="w-40">
                      <input type="time"  class="form-control" name="giora"  />
                  </div>
                 
                  <div class="w-40 ml-5">
                    
                  </div>
                </div> 
                <div class="d-flex text-left mb-2 mt-2 mr-2 ml-2 align-items-center">
                  @error('giovao')
                  <div class="input-group  ml-5 mt-2" >
                    <p style="color: red">Bạn đang để trống giờ vào !!!</p>
                  </div>
                  @enderror
                  @error('giora')
                  <div class="input-group  ml-5 mt-2" >
                    <p style="color: red">Bạn đang để trống giờ ra !!!</p>
                  </div>
                  @enderror
                </div>

                <div class="d-flex text-left mb-2 mt-2 mr-2 ml-2 align-items-center">
                  <div class="w-0 ml-2">
                      <input type="checkbox" onclick="check()" id="cbphongban"  class="check" value="phongban"  name="checkchon" style="width: 1em; height: 1em;" >
                  </div>
                  <div class="w-30 pl-2 mr-2">
                    <label class="my-auto">Tăng ca ,bổ xung</label>
                  </div>
                  <div class="w-0 ml-2">
                    <input type="checkbox" name="checkvang" style="width: 1em; height: 1em;" >
                  </div>
                  <div class="w-30 pl-2 mr-2">
                    <label class="my-auto">Vắng</label>
                  </div>
                </div> 
                <div id="phongban">
                  <div  class="d-flex text-left mb-2 mt-2 mr-2 ml-2 align-items-center">
                    <div class="w-20 pl-2 mr-2">
                      <label class="my-auto">Tổng giờ làm Thêm </label>
                    </div>
                    <div class="w-40">
                      <input type="time"  class="form-control"name="tonggiolamthem"  />
                    </div>
                    <div class="w-10 pl-2 mr-2 ml-5">
                      <label class="my-auto">Giờ làm bổ xung</label>
                    </div>
                    <div class="w-40">
                       <input type="time"  class="form-control" name="giolamboxung"  />
                    </div>
                    <div class="w-40 ml-5">
                      
                    </div>
                  </div>
                </div> 
            </div>
        </div>
      </div>
    </div>
  </form>
    <div class="row ml-1 " style="margin-top: -20px">
        <div class="card w-auto">
          <div class="table-responsive text-nowrap mt-3 ml-2">
            <table class="table table-striped table-bordered mb-3">
              <thead class="text-center text-nowrap thead-light">
                 <tr>
                    <th class="w-30">
                      Nhân viên
                    </th>
                    @for($i=$firstOfMonth;$i<=$endOfMonth;$i++)
                      <th>
                          <div>
                            <?php echo \Carbon\Carbon::parse($i)->format('d');?>
                          </div>
                          <div>
                            <?php echo \Carbon\Carbon::parse($i)->format('l');?>
                          </div>
                      </th>
                    @endfor
                    <th>
                      Tổng ngày làm
                    </th>
                 </tr>
               </thead>
               <tbody>
                  
                    @foreach($employees as $employee)
                      @if ($employee->Id_PhanQuyen =='1')
                          
                      @else
                      <tr>
                        <td style="display: flex;">
                              @if ($employee->HinhAnh == '')
                                @if ($employee ->GioiTinh == 'Nam')
                                    <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                @else
                                    <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                @endif
                              @else
                                  <img src="{{ asset('./images/' . $employee->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                              @endif
                              <p class="ml-2 mt-2">
                                {{$employee->Ho.' '.$employee->Ten}}
                              </p>
                        </td>
                        @for($i=$firstOfMonth;$i<=$endOfMonth;$i++)
                          <?php
                           $sumDateWork=App\Models\chamcong::where('Id_NhanVien','=',$employee->Id_NhanVien)
                                                            ->where('Ngay','>=',$firstOfMonth)
                                                            ->where('Ngay','<=',$endOfMonth)
                                                            ->where('GioVao','>=','07::00::00')
                                                            ->count('Ngay');
                            $countWork=App\Models\chamcong::where('Ngay','=',$i)
                                      ->where('Id_NhanVien','=',$employee->Id_NhanVien)
                                      ->count();
                            $getDayOfWork=App\Models\chamcong::where('Id_NhanVien','=',$employee->Id_NhanVien)
                                                        ->where('Ngay','=',$i) 
                                                        ->with('nhanvien')  
                                                        ->get();  
                            // $totalTime=Illuminate\Support\Facades\DB::select("SELECT SEC_TO_TIME(TIME_TO_SEC(GioRa)-TIME_TO_SEC(GioVao)+TIME_TO_SEC(GioBS)+TIME_TO_SEC(GioTangCa)) 
                            //  From chamcong where Ngay=$i and Id_NhanVien=$employee->Id_NhanVien");
                             $totalTime=Illuminate\Support\Facades\DB::select("SELECT SEC_TO_TIME(TIME_TO_SEC(GioRa)-TIME_TO_SEC(GioVao)+TIME_TO_SEC(GioBS)+TIME_TO_SEC(GioTangCa)) AS tonggio 
                            From chamcong where Id_NhanVien='$employee->Id_NhanVien' and Ngay='$i'");
                          ?>
                            @if ($countWork == null)
                            <td style="text-align: center" >
                                    
                            </td>
                              @else
                                  @foreach($getDayOfWork as $sumdate => $work)
                                      <?php
                                        $startTime=\Carbon\Carbon::parse($work->GioVao);
                                        $endTime= \Carbon\Carbon::parse($work->GioRa);
                                        $time =  $startTime->diff($endTime)->format('%H:%I:%S');
                                        $fullDate='10:00:00';
                                        $halfDate='05:00:00';
                                      ?>
                                      @if ($work->GioVao =='00:00:00' && $work->GioRa=='00:00:00')
                                        <td style="text-align: center">
                                          <a href="" data-toggle="modal" data-target="#thoigianlamviec-{{$work->Id_ChamCong}}">
                                            <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                          </a>
                                        </td>
                                      @else
                                          @if ($totalTime[0]->tonggio  >= $fullDate)
                                            <td style="text-align: center">
                                              <a href="" data-toggle="modal" data-target="#thoigianlamviec-{{$work->Id_ChamCong}}">
                                                <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                              </a>
                                            </td>
                                          @else
                                              @if($totalTime[0]->tonggio >=$halfDate && $totalTime[0]->tonggio < $fullDate)
                                              <td style="text-align: center">
                                                <a href="" data-toggle="modal" data-target="#thoigianlamviec-{{$work->Id_ChamCong}}">
                                                  <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                                  <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                                </a>
                                              </td>
                                              @else
                                                <td style="text-align: center">
                                              <a href="" data-toggle="modal" data-target="#thoigianlamviec-{{$work->Id_ChamCong}}">
                                                <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                              </a>
                                            </td>
                                              @endif
                                          @endif
                                      @endif


                                      {{-- start modal --}}
                                      <div class="w-50 d-flex justify-content-end">
                                        <div class="modal fade" id="thoigianlamviec-{{$work->Id_ChamCong}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                                {{-- START FORM --}}
                                                <form  method="post" action="{{ route('updatetimekeeping',['id'=>$work->Id_ChamCong]) }}">
                                                  @csrf
                                                    <div class="modal-content p-3" style="width: 550px;">
                                                        <div class="flex-row d-flex justify-content-center mb-2">
                                                            <div class="col"></div>
                                                            <div class="col"><h2 class="text-info">Thời gian làm việc</h2></div>
                                                            <a href="{{route('deletetimekeeping',['id'=>$work->Id_ChamCong])}}" class="col text-right" style="font-size:17px;color:black;">Xóa</a>
                                                        </div>
                                                        {{-- <input type="hidden" name="idchamcong" value="{{$work->Id_ChamCong}}" class="form-control"  /> --}}
                                                        <div class="d-flex flex-column w-auto mt-3">
                                                          <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Nhân viên:<img class="ml-5" src="{{ asset('./images/' . $work->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt=""> {{' ' .$work->nhanvien->Ho.' '.$work->nhanvien->Ten}} </label>
                                                            </div>
                                                            <input type="hidden" name="nhanvienud" value="{{$work->Id_NhanVien}}">
                                                          </div>  
                                                          <div class="d-flex text-left mb-2 align-items-center">
                                                              <div class="w-20 pl-2 mr-2">
                                                                <label class="my-auto">Ngày :{{' '.\Carbon\Carbon::parse($work->Ngay)->format('d-m-Y')}} </label>
                                                              </div>
                                                          </div>
                                                          <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-20 pl-2 mr-2">
                                                              <label class="my-auto">Tổng thời gian làm :{{$totalTime[0]->tonggio}} </label>
                                                            </div>
                                                        </div>
                                                          <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-100 pl-2 mr-2 text-center mb-2 mt-4">
                                                              <label class="my-auto">Thời gian làm việc cụ thể</label>
                                                            </div>
                                                          </div>
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                              <div class="w-40 pl-2 mr-2">
                                                                  <label class="my-auto">Giờ vào</label>
                                                              </div>
                                                              <div class="w-50">
                                                                  <input type="time" name="giovaoUD" 
                                                                  @if ($work->GioVao == '00:00:00')
                                                                      value="null"
                                                                  @else
                                                                    value="{{$work->GioVao}}"
                                                                  @endif
                                                                  class="form-control"required/>
                                                              </div>
                                                              <div class="w-40 pl-2 mr-2">
                                                                <label class="my-auto">Giờ ra</label>
                                                              </div>
                                                              <div class="w-50">
                                                                <input type="time" name="gioraUD" 
                                                                @if ($work->GioRa == '00:00:00')
                                                                    value="null"
                                                                @else
                                                                  value="{{$work->GioRa}}"
                                                                @endif
                                                                class="form-control"required/>
                                                            </div>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                              <div class="w-100 pl-2 mr-2 text-center mb-2 mt-4">
                                                                <label class="my-auto">Tăng ca/ Bổ sung</label>
                                                              </div>
                                                              <div class="w-0 ml-2">
                                                                <input type="checkbox"
                                                                  @if ($totalTime[0]->tonggio =='00:00:00')
                                                                  checked
                                                                @endif
                                                                  name="checkbstc" style="width: 1em; height: 1em;" >
                                                              </div>
                                                              <div class="w-30 pl-2 mr-2">
                                                                <label class="my-auto">Trống</label>
                                                              </div>
                                                          </div>
                                                          <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-40 pl-2 mr-2">
                                                                <label class="my-auto">Giờ vào</label>
                                                            </div>
                                                            <div class="w-50">
                                                                  <input type="time" name="giotangcaUD" 
                                                                  @if ($work->GioTangCa == '00:00:00')
                                                                    value="null"
                                                                  @else
                                                                    value="{{$work->GioTangCa}}"
                                                                  @endif
                                                                  class="form-control"/>
                                                              </div>
                                                              <div class="w-40 pl-2 mr-2">
                                                                <label class="my-auto">Giờ ra</label>
                                                              </div>
                                                              <div class="w-50">
                                                                <input type="time" name="giobsUD" 
                                                                @if ($work->GioBS == '00:00:00')
                                                                    value="null"
                                                                @else
                                                                  value="{{$work->GioBS}}"
                                                                @endif
                                                                class="form-control"/>
                                                              </div>
                                                            </div>
                                                            <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                                <div class="w-10 mr-2"></div>
                                                                <div class="w-75 d-flex">
                                                                    <input type="submit" name="btn" class="btn btn-success w-40" value="Cập nhập">
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
                                      {{-- end modal --}}

                                  @endforeach
                              @endif
                        @endfor
                        <td>
                          {{$sumDateWork}}
                        </td>
                    </tr>
                      @endif

                    @endforeach
               </tbody>
            </table>
          </div>
        </div>
    </div>   
</div>
<script type="text/javascript">
  window.onload = function() {
      document.getElementById("phongban").style.display = 'none';
    
  }
  function check()
  {
      var cbphongban=document.getElementById("cbphongban");
      var inputphongban=document.getElementById("phongban");
      if(cbphongban.checked)
      {
          inputphongban.style.display="block";
          
      }
      else
      {
         
          inputphongban.style.display="none";
      }
  }
</script>
@endsection

{{-- <script type="text/javascript">
    $(document).on('change','.selectthangnam', function(){
      $thang=$('#thang').val();
      $nam=$("#nam").val();
      $.ajax({
          type : 'get',
          url : '/admin/timekeeping/Search',
          data:{
                  'thang':$thang,
                  'nam':$nam
              },
          dataType: 'json', 
          encode  : true,
              success:function(data){
                  $('#listdatatimekeeping').html(data);
                  console.log("sucess");
              },
              error:function(){ 
                      console.log("Error!!!!");
              }
          
          });
      });
</script> --}}