@extends('index')
@section('content')
<style>
    .an {
   display: block;
     display: -webkit-box;
     font-size: 16px;
     line-height: 1.9;
     -webkit-line-clamp: 4;  /* số dòng hiển thị */
     -webkit-box-orient: vertical;
     overflow: hidden;
     /* text-overflow: ellipsis; */
}
</style>
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Tài liệu</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('tailieu')}}">Tài liệu</a></li>
                {{-- <li class="breadcrumb-item active"><a href="{{route('typedoc')}}">loại văn bản</a></li> --}}
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
    <div class="row ml-1 mr-1" style="margin-top: -20px;">
        <div class="col-lg-12">
            {{-- <div class="card">
                <div class="card-body"> --}}
                    <form action="{{ route('storetailieu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="accordion-nine" class="accordion accordion-active-header shadow-lg">
                        <div class="accordion__item">
                                <div class="accordion__header" data-toggle="collapse" data-target="#active-header_collapseOne">
                                    <span class="accordion__header--icon"></span>
                                    <h4 class="accordion__header--text">Thêm tài liệu</h4>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                            </div>
                            <div id="active-header_collapseOne" class="collapse accordion__body show" data-parent="#accordion-nine">
                                <div class="accordion__body--text"> 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label>Người gửi</label>
                                            @foreach ($admin as $infoAdmin)
                                                <input type="text" class="form-control" name="nhanvien" disabled value="{{$infoAdmin->Id_NhanVien.' - '.$infoAdmin->Ho.' '.$infoAdmin->Ten}}" placeholder="Mã người gửi - Tên người gửi" >  
                                            @endforeach
                                        </div>
                                    </div>  
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Tài liệu</label>
                                            <input type="file" class="form-control" name="tailieu" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Ngày</label>
                                            <input type="datetime" disabled value="{{$dateNow}}" class="form-control" name="ngay" required>
                                        </div>
                                    </div>  
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="card-body">
                                                <label>Mô tả</label>
                                                <textarea  class="summernote" required name="mota"></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col">
                                            <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Thêm tài  liệu</button>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div> --}}
        </div>
    </div>
</form>
    <div class="col-lg-12 mt-2 mr-1 ml-1">
        <div class="card">
            <div class=" mt-2 mb-2 col-lg-12 shadow-lg">
                <table class="table table-striped table-bordered" style="wilth:auto;" >
                    <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-0">
                                STT
                            </th>
                            <th class="w-0">
                                Ảnh
                            </th>
                            <th class="w-15">
                                Nhân Viên
                            </th>
                            <th class="w-20">
                                Phòng 
                            </th>
                            <th class="w-20">
                                Tài liệu
                            </th>
                            <th class="w-30">
                                Mô tả
                            </th>
                            <th class="w-10">
                                Thời gian
                            </th>
                            <th class="w-0">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tailieu as $stt => $tl)
                        <tr>
                            <td style="text-align: center">
                                    {{++$stt}}
                            </td>
                            <td>
                                @if ($tl ->nhanvien->HinhAnh == '')
                                    @if ($tl ->nhanvien->GioiTinh == 'Nam')
                                        <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                                    @else
                                        <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                                    @endif
                                @else
                                    <img src="{{ asset('./images/' . $tl ->nhanvien->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                                @endif
                            </td>
                            <td>
                                    {{$tl->nhanvien->Ho.' '.$tl->nhanvien->Ten}}
                            </td>
                            <td>
                                @foreach ($nhanvien as $employee)
                                    {{$employee->phongban->TenPhongBan}}
                                @endforeach
                            </td>
                            <td >
                                @switch(pathinfo($tl->TaiLieu, PATHINFO_EXTENSION))
                                    @case('')
                                    @break    
                                    @case('docx')
                                        <img src="{{asset('./icons/word.png')}}"style="height: 15px;width: 15px;" alt="word">
                                        @break
                                    @case('xlsx')
                                        <img src="{{asset('./icons/excel.png')}}"style="height: 15px;width: 15px;" alt="word">
                                        @break
                                    @default
                                        <img src="{{asset('./icons/file.png')}}" style="height: 15px;width: 15px;"alt="word">
                                        @break
                                @endswitch
                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$tl->TaiLieu)}}'>  {{$tl->TaiLieu}}</a>
                            </td>
                            <td class="an">
                                {{-- {!! $tl->MoTa!!} --}}
                                <?php
                                $string = preg_replace("/&nbsp;/",'', $tl->MoTa);
                                    echo $string;
                                ?>
                            </td>
                            <td style="text-align: center">
                                {{ \Carbon\Carbon::parse($tl->Ngay)->format('d-m-Y') }}
                            </td>
                            <td class="text-center mr-3">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu ">
                                        <form action="{{ route('destroytailieu',['id'=>$tl->Id_TaiLieu])}}" >
                                            @csrf
                                                <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection