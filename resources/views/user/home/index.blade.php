@extends('userindex')
@section('contentuser')
<style>
  .b {
  white-space: nowrap; 
  width:900px; 
  overflow: hidden;
  text-overflow: ellipsis; 
}
.vanbana:hover 
    {
        background-color: #f8f9fa;
    }
#vanban {
    width:300px ;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;  
  overflow: hidden;
}
</style>
<div class="container" style="margin-top: 20px">
    <div class="row">
        @if ( Session::has('success') )
        <div class="alert alert-primary solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-account-search"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button> {{ Session::get('success') }}
        </div>
    @endif
    
    
    @if ( Session::has('error') )
        <div class="alert alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    @if ( Session::has('errorinput') )
    <div class="alert alert-warning solid alert-dismissible fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{ Session::get('errorinput') }}</strong> 
    </div>
    @endif
        {{-- <h1>test</h1> --}}
        @if (Session::has('welcome'))
            <h3  style="color: #593bdb">{{Session::get('welcome') }}</h3><h4>, chúc bạn ngày mới làm việc hiệu quả</h4>
        @endif
        
        @if (Session::has('comeback'))
            <h3  style="color: #593bdb">{{  Session::get('comeback') }}</h3>
       @endif
       @if (Session::has('attendance'))
            <script type="text/javascript">alert("Chúc bạn ngày mới làm việc tốt") </script>
       @endif
    </div>

</div>

<div class="col-lg-9 col-sm-6 " style="">
    <h4 class="ml-5">Văn bản</h4>
    <div class="d-flex flex-wrap ">
        {{-- start văn bản --}}
        @foreach ($documents as $document)
            <a  class="vanbana" style=" text-decoration: none;" href="{{route('detail_user',['id'=>$document->Id_VanBan])}}">
                <div class="card shadow-lg ml-5 ">
                    <img src="{{ asset('./documents/' . $document->HinhAnh) }}" style="height: 150px;width: 300px;" alt="">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="ml-1">{{$document->TenVanBan}}</h4>
                            <div class="pt-3 ml-1 pb-3 pl-0 pr-0 text-left">
                                <div id="vanban" style="color: #6b6767;" >
                                    {!!$document->NoiDung!!}
                                </div>
                                {{-- <p class="b text-left ml-3">{!! $document->NoiDung!!}</p> --}}
                            </div>
                            <span class="mb-2 ml-3" style="color: #6b6767;">
                                Thời gian: 
                                    <?php
                                        // \Carbon\Carbon::setLocale('vi'); 
                                        // $timeNow=\Carbon\Carbon::parse($document ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                                    ?>
                                {{-- {{$timeNow}}
                            </span> --}}
                                {{ \Carbon\Carbon::parse($document->Ngay)->format('d-m-Y')}}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        {{-- end văn bản --}}
    </div>
</div>
{{-- thông báo công việc --}}
<div class="col-lg-3 col-sm-6  " >
    <div class="card shadow-lg" >
        <div class="card-header" >
            <dt class="">Thông báo</dt>
        </div>
        <div class="card-body">
            <ul style="overflow-y:auto; height: 300px;">
                @foreach ($calendarWork as $work)
                    <?php
                        $WorkDateNow=Carbon\Carbon::parse($work->Ngay)->format('Y-m-d')
                    ?>
                    @if ($WorkDateNow == $dateNow)
                        <li>
                            <p>Công việc</p>
                            <a href="{{route('workuser')}}">
                                <div class="d-flex flex flex-row">
                                   <img src="{{ asset('./images/'.$work->nguoigiao->HinhAnh)}}" style="width:150px;height:50px;border-radius: 50%;" alt="">
                                   <div class="b text-left ml-3 my-auto" style="color: black;">
                                        {!!$work->NoiDung!!}
                                    </div>
                                </div>
                            </a>
                        </li>      
                    @endif
                    
                @endforeach  
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div class="d-flex flex-wrap">
        <div class="p-2 m-2">
            <a href="{{ route('workuser') }}" style="height: 100px; width: 250px;" class=" shadow-lg btn btn-success">
                  <div class="stat-widget-one ">
                      <div class="stat-icon d-inline-block">
                          <i class="mdi mdi-wallet-travel"></i>
                      </div>
                      <div class="stat-content d-inline-block">
                          <div class="stat-digit text-white"><dt>Công việc</dt></div>
                      </div>
                  </div>
              </a>
          </div>
          <div class="p-2 m-2">
            <a href="{{ route('salary_user') }}" style="height: 100px; width: 250px;" class=" shadow-lg btn btn-primary">
                <div class="stat-widget-one ">
                    <div class="stat-icon d-inline-block">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-digit text-white"><dt>Lương </dt></div>
                    </div>
                </div>
              </a>
          </div>
          <div class="p-2 m-2">
              <a href="{{ route('traininguser') }}" style="height: 100px; width: 250px;"class=" shadow-lg btn btn-secondary">
                  <div class="stat-widget-one ">
                      <div class="stat-icon d-inline-block">
                          <i class="mdi mdi-library"></i>
                      </div>
                      <div class="stat-content d-inline-block">
                          <div class="stat-digit text-white"><dt>Đào tạo</dt></div>
                      </div>
                  </div>
              </a>
          </div>
          <div class=" p-2 m-2">
            <a href="{{ route('reportuser') }}" style="height: 100px; width: 250px;" class=" shadow-lg btn btn-danger">
                <div class="stat-widget-one ">
                    <div class="stat-icon d-inline-block">
                        <i class="mdi mdi-layers"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-digit text-white"><dt>Yêu cầu/</dt></div>
                        <div class="stat-digit text-white"><dt>Báo cáo</dt></div>
                        
                    </div>
                </div>
            </a>
        </div>
        <div class="p-2 m-2">
            <a href="{{ route('containdocuser') }}" style="height: 100px; width: 250px;" class=" shadow-lg btn btn-warning">
                <div class="stat-widget-one ">
                    <div class="stat-icon d-inline-block">
                        <i class="mdi mdi-file-outline"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-digit text-white"><dt>Tài liệu</dt></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="p-2 m-2">
            <a href="{{ route('docuser') }}" style="height: 100px; width: 250px;"class=" shadow-lg btn btn-info">
                <div class="stat-widget-one ">
                    <div class="stat-icon d-inline-block">
                        <i class="mdi mdi-file-document"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-digit text-white"><dt>Văn bản</dt></div>
                    </div>
                </div>
            </a>
        </div>
        <?php
          $employeeOfDerpartment=App\Models\phongban::where('NguoiQuanLy','=',session()->get('user_id'))
                            ->get();
            $checkManagerOfDerpartment=0;
            if($employeeOfDerpartment->isEmpty())
                {
                    $checkManagerOfDerpartment=0;
                }
            else
            {
                $checkManagerOfDerpartment=1;
            }
        ?> 
        @if ($checkManagerOfDerpartment  == 1 )            
            <div class="p-2 m-2">
                <a href="{{ route('evaluateemployee_user') }}" style="height: 100px; width: 250px;"class=" shadow-lg btn btn-info">
                    <div class="stat-widget-one ">
                        <div class="stat-icon d-inline-block">
                            <i class="mdi mdi-account-box-outline"></i>
                            {{-- <i class="mdi mdi-file-document"></i> --}}
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-digit text-white"><dt>Đánh giá</dt></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="p-2 m-2">
                <a href="" data-toggle="modal" data-target="#work" style="height: 100px; width: 250px;" class=" shadow-lg btn  btn-info">
                    <div class="stat-widget-one ">
                        <div class="stat-icon d-inline-block">
                            <i class="mdi mdi-pencil-box-outline fa-3x"  ></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-digit text-white"><dt>Họp</dt></div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

    </div>
</div>
<div class="col-lg-12">
    <div class="card text-center show-lg" style="border: 1px solid;">
        <div class="card-header" style="background-color: #008bcd;">
            <dt class="text-white">Lịch họp trong hôm nay </dt>
        </div>
        <div class="card-body">
            @foreach ($allMettings as $meetting)
                @if ($meetting->Id_PhongBan == $employees[0]->Id_PhongBan || $meetting->Id_PhongBan == null)
                    <div style="display: flex">
                        <p style="color: red" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($meetting->ThoiGian)->format('H : m') }}</p>
                        <div class="b text-left ml-3" >
                            {!!$meetting->NoiDung!!}
                        </div>
                    </div>
                    <div style="display: flex">
                        <div class="col-lg-2">
                            <p style="color: #1099c3;">Địa điểm: {{$meetting->DiaDiem}}</p>
                        </div>
                        <div class="col">
                            <dt>Thành phần: {{$meetting->ThanhPhan}}</dt>
                            {{-- <p></p> --}}
                        </div>
                    </div>
                {{-- @else 
                    @if ($meetting->Id_PhongBan == null)
                            <div style="display: flex">
                                <p style="color: red" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($meetting->ThoiGian)->format('H : m') }}</p>
                                <div class="b text-left ml-3" >
                                    {!!$meetting->NoiDung!!}
                                </div>
                            </div>
                            <div style="display: flex">
                                <div class="col-lg-2">
                                    <p style="color: #1099c3;">Địa điểm: {{$meetting->DiaDiem}}</p>
                                </div>
                                <div class="col">
                                    <dt>Thành phần: {{$meetting->ThanhPhan}}</dt>
                                </div>
                            </div>
                       @endif --}}
                @endif
            @endforeach
        </div>
        <div class="card-footer">
            <div class="card-text text-dark"><a href="{{route('workuser')}}" style="position: sticky;" class="">xem chi tiết</a></div>
        </div>
    </div>
</div>
</div>

{{-- start model cuộc họp --}}
<div class="modal fade" id="work" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- <div id="simpleModal" class="modal" tabindex="-1" role="dialog"> --}}
        <form action="{{route('createmt_user')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tạo lịch họp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">ngày</label>
                                <input type="date" class="form-control" value="{{$dateNow}}" name="ngay" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Thời gian</label>
                                <input type="time" class="form-control" name="thoigian" required>
                            </div>
                        </div> 
                        {{-- <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">Phòng ban </label>
                                <select id="remain-open" name="phongban" class="form-control"  id="" required>
                                    <option value="">Họp trong phòng ban</option>                  
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="">Thành phần</label>
                                <input type="text" class="form-control" name="thanhphan" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">Địa điểm</label>
                                <input type="text" class="form-control" name="diadiem" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Người chủ trì</label>
                                <div class="flex d-flex flex-row">
                                    @foreach ($employees as $manager)
                                    <img src="{{ asset('./images/' . $manager->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                    <p class="my-auto ml-2">{{$manager->Ho.' '.$manager->Ten}}</p>
                                    @endforeach              

                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">file</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="">Nội dung</label>
                                <textarea name="noidung" class="form-control summernote"  id="" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end mb-2">
                        <div class="w-25 mr-2"></div>
                        <div class="w-75 d-flex">
                            <button type="submit" class="btn btn-success w-100">Tạo</button>
                            <button type="submit" class="btn btn-info w-100 mr-2 ml-5" data-dismiss="modal">Thoát</button>
                        </div>
                        <div class="w-25 mr-2"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
{{-- end --}}
@endsection