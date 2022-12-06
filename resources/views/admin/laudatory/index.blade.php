@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3> Khen thưởng </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('laudatory')}}">KTKL</a></li>
                <li class="breadcrumb-item active"><a href="{{route('laudatory')}}">khen thưởng</a></li>
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
    {{-- FORM --}}
    <form action="{{ route('createlaudatory')}}" method="POST">
        @csrf
    <div class="row" style="margin-top: -20px;">
        <div class="col-lg-12 shadow-lg">
            {{-- <div class="card">
                <div class="card-body"> --}}
                    <div id="accordion-nine" class="accordion accordion-active-header shadow-lg">
                        <div class="accordion__item">
                                <div class="accordion__header" data-toggle="collapse" data-target="#active-header_collapseOne">
                                    <span class="accordion__header--icon"></span>
                                    <h4 class="accordion__header--text">Khen thưởng</h4>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                            </div>
                            <div id="active-header_collapseOne" class="collapse accordion__body show shadow-lg" data-parent="#accordion-nine">
                                <div class="accordion__body--text">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Nhân viên</label>
                                            <select id="remain-open" name="nhanvien" class="form-control"  id="" required>
                                                <option value="">Mã nhân viên - Tên nhân viên</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho.' '.$employee->Ten}}</option>
                                                @endforeach                                
                                            </select>
                                        </div>                   
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Ngày</label>
                                            <input type="Date" name="ngay"  class="form-control" value="" placeholder="Date" required>
                                        </div>
                                    </div>  
                                    <div class="form-row">  
                                        <div class="col-xl-12 form-group col-xxl-12" required>
                                        <div class="card-body">
                                            <label>Mô tả</label>
                                            <textarea  class="summernote" name="mota"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Thưởng</label>
                                            <input type="number" name="thuong" class="form-control" placeholder="Tiền thưởng"required>
                                        </div>
                                    </div> 
                                    <button type="submit" style="margin-left: 500px; width:150px;height:50px;font-size: 20px;" class="btn  btn-primary">Khen thưởng</button>            
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div> --}}
        </div>
    </div>
</form>
    {{-- END Form Kỹ luật --}}
    <div class="row shadow-lg mt-2">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center">Danh sách nhân viên khen thưởng</h4>
                </div>
            <div class=" ml-2 mr-2 mt-2 " style="width: auto; margin-bottom:30px;" >
                <table class="form-group  table table-striped table-bordered"  >
                <thead class="text-center text-nowrap thead-light">
                <tr>
                    <th class="w-5">
                        STT
                    </th>
                    <th class="">
                        Ảnh
                     </th>
                    <th class="w-5">
                        Mã NV
                    </th>
                    <th class="w-20">
                        Họ Tên
                    </th>
                    <th class="w-10">
                        Ngày
                    </th>
                    <th class="w-40">
                        Mô tả
                    </th>
                    <th class="15">
                      Thưởng
                    </th>
                </tr>
                </thead>
            <tbody>
                @foreach ($laudatorys as $stt =>$laudatory)
                    <tr>
                        <td style="text-align: center">
                            {{++$stt}}
                        </td>
                        {{-- <td>
                            {{$laudatory->nhanvien->Ho}}
                        </td> --}}
                            <td>
                                @if ($laudatory->nhanvien->HinhAnh == '')
                                    @if ($valuEmployee ->GioiTinh == 'Nam')
                                        <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                                    @else
                                        <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                                    @endif
                                @else
                                    <img src="{{ asset('./images/' . $laudatory->nhanvien->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                                @endif
                            </td>
                            <td style="text-align: center">
                                {{$laudatory->nhanvien->Id_NhanVien}}
                            </td>
                            <td>
                                {{$laudatory->nhanvien->Ho }} {{$laudatory->nhanvien->Ten }}
                            </td>
                        <td style="text-align: center">
                            {{ \Carbon\Carbon::parse($laudatory ->Ngay )->format('d-m-Y') }}
                        </td>
                        <td>
                            {!! $laudatory ->MoTa !!}
                        </td>
                        <td style="text-align: center">
                            {{$laudatory ->Thuong}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection 