@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Đánh giá nhân viên</h3>
        </div>
      
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Đánh giá</a></li>
                {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> --}}
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    @if ( Session::has('success') )
        <div class="alert mb-4 alert-primary solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-account-search"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button> {{ Session::get('success') }}
        </div>
    @endif


    @if ( Session::has('error') )
        <div class="alert mb-4 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
   
      
    <div class="row ml-1 mr-1 " style="margin-top: -20px;">
        <div class="col-lg-12 ">
            <form action="{{ route('storeevaluation')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="accordion-nine" class="accordion accordion-active-header shadow-lg">
                    <div class="accordion__item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#active-header_collapseOne">
                            <span class="accordion__header--icon"></span>
                            <h4 class="accordion__header--text">Đánh giá</h4>
                            <span class="accordion__header--indicator"></span>
                        </div>
                    </div>
                    <div id="active-header_collapseOne" class="collapse accordion__body show" data-parent="#accordion-nine">
                        <div class="accordion__body--text"> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Nhân viên bị Đánh giá</label>
                                    <select id="remain-open" class="form-control" name="nhanvien">
                                        <option value="">Mã nhân viên - Tên nhân viên</option>
                                        @foreach ($employyees as $employyee)
                                            @if ($employyee->Id_PhanQuyen == '1')
                                                <option disabled value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                            @else
                                                <option value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Ngày</label>
                                    <input type="date" class="form-control" name="ngay" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Người đánh giá</label>
                                    <select id="remain-open" class="form-control" name="nguoidanhgia" >
                                        <option value="">Mã người đánh giá - Tên người đánh giá</option>
                                        @foreach ($employyees as $employyee)
                                            @if ($employyee->Id_PhanQuyen == '1')
                                                <option value="{{$employyee->Ho.' '.$employyee->Ten}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>    
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Hình thức</label>
                                    <input type="text" class="form-control" name="hinhthuc" placeholder="Hình thức đánh giá" required>
                                </div>
                                <div class="col-md-6">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="filedanhgia">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <label>Nội dung</label>
                                        <textarea  class="summernote" required name="noidung"></textarea>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-5"></div>
                                <div class="col">
                                    <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Đánh giá</button>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 ml-1 mr-1 mt-4">
        <div class="card shadow-lg">
            <div class="card-content">
                <table class="table table-striped table-bordered w-auto dataTable no-footer ml-1 mr-1 mt-2" >
                    <thead class="text-center text-nowrap thead-light">
                    <tr>
                        <th class="w-5">
                            STT
                        </th>
                        <th class="w-5">
                            Ảnh
                         </th>
                        <th class="w-5">
                            Mã NV
                        </th>
                        <th class="w-15">
                            Tên nhân viên
                        </th>
                        <th class="w-10">
                           Ngày
                        </th>
                        <th class="w-15">
                            Người Đánh giá
                        </th>
                        <th  class="w-20">
                            Nội dung
                        </th>
                        <th class="w-15">
                            Hình thức
                        </th>
                        <th class="w-20">
                            File
                        </th>
                        <th class="w-5">
                           
                        </th>
                    </tr>
                    </thead>
                <tbody >
                   @foreach ($evaluations as $stt=> $evaluation)
                       <tr>
                           <td class="text-center">
                                {{++$stt}}
                           </td>
                            <td class="text-center">
                      
                                <img src="{{ asset('./images/' . $evaluation->nhanvien->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                            </td>
                            <td class="text-center">
                                {{$evaluation->NhanVien}}
                            </td>
                           <td>{{$evaluation->nhanvien->Ho.' '.$evaluation->nhanvien->Ten}}</td>
                           <td class="text-center">{{\Carbon\Carbon::parse($evaluation->Ngay)->format('m-d-Y')}}</td>
                           <td>
                               {{$evaluation->NguoiDanhGia}}
                           </td>
                           <td>{!!$evaluation->NoiDung!!}</td>
                           <td>{{$evaluation->HinhThuc}}</td>
                           <td class="text-center">
                            @switch(pathinfo($evaluation->File, PATHINFO_EXTENSION))
                                @case('')
                                    @break
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
                                <a target='_blank' style="color: black;" href='{{ asset('./folderEvalution/'.$evaluation->File)}}'>  {{$evaluation->File}}</a>
                            </td>
                           <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-center">
                                        <form action="{{ route('editevaluation',['id'=>$evaluation->Id_DanhGia])}}">
                                        @csrf 
                                            <button class="btn btn-success w-70 ml-4"><i class="fa fa-pencil m-r-5"></i> Sửa</button>                                 
                                        </form>
                                        <form action="{{ route('destroyevaluation',['id'=>$evaluation->Id_DanhGia])}}" >
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