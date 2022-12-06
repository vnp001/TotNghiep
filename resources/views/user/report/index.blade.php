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
                    <h2 style="color: #593bdb">Yêu cầu/ Báo cáo</h2>
                    
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Báo cáo</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    </div>

  
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
                <form action="{{ route('requestreportuser')}}" method="post">
                    @csrf
                <div class=" card shadow-lg">
                    <div class="card-header">
                        <h5>Báo cáo</h5>
                    </div>
                    <div class="card-content">
                        <div class="form-row mt-2 ml-2" style="display: flex">
                            <label class="my-auto mr-3"> Nhân viên :</label>
                            @foreach ($employees as $employee)                    
                                @if ($employee->HinhAnh == '')
                                        @if ($employee ->GioiTinh == 'Nam')
                                        <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                @else
                                    <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                @endif
                                @else
                                    <img class="ml-5" src="{{ asset('./images/' . $employee->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                @endif
                                <p class="ml-3 mt-2">
                                    <?php 
                                    echo $employee->Ho.' '.$employee->Ten;
                                ?>
                                </p>    
                            @endforeach
                        </div>
                        <div class="d-flex flex-column w-auto mt-3">
                            <div class="d-flex text-left mb-2 align-items-center">
                                <div class="w-25 pl-2 mr-2">
                                    <label class="my-auto">Báo cáo</label><b class="text-danger"> * </b>:
                                </div>
                                <div class="w-75 ">
                                    <select name="loaiyeucau" id="remain-open"class="form-control"required>
                                        <option value="">Loại yêu cầu</option>
                                        @foreach ($typeOfRequests as $typeOfRequest)
                                            <option  value="{{$typeOfRequest->Id_LoaiYeuCau}}">{{$typeOfRequest->TenLoaiYeuCau}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-20 pl-2 mr-2">
                                    <label class="my-auto ml-5">Ngày :</label>
                                </div>
                                <div class="w-70 mr-5">
                                    <input type="date" name="" disabled value="{{$dateNow}}" class="form-control" required value="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 form-group col-xxl-12" required>
                            <div class="card-body">
                                <label>Mô tả</label>
                                <textarea  class="summernote" name="mota"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <button type="submit" style=" width:150px;height:50px;font-size: 20px;" class="btn  btn-primary">Báo cáo</button>            
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
    </div>
  
<div class="col-lg-12">
    <div class="card shadow-lg">
        <div class="card-header">
            <dt> Các yêu cầu đã gửi</dt>
        </div>
        <div class="card-content m-2">
            <table class="table DTtable table-striped table-bordered" >
                <thead class="text-center text-nowrap" style="background-color: #008bcd;">
                    <tr>
                        <th class="w-5  text-white">STT</th>
                        <th class="w-10 text-white">Ngày</th>
                        <th class="w-15 text-white">Báo cáo</th>
                        <th class="w-30 text-white">Mô tả</th>
                        <th class="w-15 text-white">Tình Trạng</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($reports as $stt => $report)
                        <tr>
                            <td class="text-center">
                                {{++$stt}}
                            </td>
                            <td class="text-center">
                                {{Carbon\Carbon::parse($report->Ngay)->format('d-m-Y h:m:s')}}
                            </td>
                            <td>
                                {{$report->loaiyeucau->TenLoaiYeuCau}}
                            </td>
                            <td>
                                {!! $report->MoTa !!}
                            </td>
                            <td class="text-center">
                                @switch($report->TinhTrang)
                                    @case(0)
                                        <span class="badge badge-pill badge-warning" style="font-size:15px">Chưa duyệt...</span>
                                        @break
                                    @case(1)
                                        <span class="badge badge-pill badge-success" style="font-size:15px">Đã duyệt</span>
                                        @break
                                    @default
                                        <span class="badge badge-pill badge-danger" style="font-size:15px">không duyệt</span>
                                        @break
                                @endswitch
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    


@endsection