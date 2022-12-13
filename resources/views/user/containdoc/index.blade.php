@extends('userindex')
@section('contentuser')
    <div class="col-lg-12">
        <div class="card page-titles shadow-lg" style="height: 90px;">
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-4 ml-3" >
                        <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                    </div>
                    <div class="col-lg-5 mt-2">
                        <h2 style="color: #593bdb">Kho Chia sẽ tài liệu và kiến thức</h2>
                        
                    </div>
                    <div class="col-lg-2 ml-5">
                        <div class="page-titles">
                            <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="">tài liệu</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4" >
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
    </div>
    <div class="row">
        <div class="col-lg-4  ml-5 col-sm-6 shadow-lg" style="">
            <form action="{{ route('addcontaineruser')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-header mt-2">
                    <h5>Thêm tài liệu</h5>
                </div>
                <div class="card-content">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Ngày</label>
                        <input type="date" name="" disabled value="{{$dateNow}}" class="form-control" required value="" id="">
                        </div>                   
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Tài liệu</label>
                            <input type="file" class="form-control" name="tailieu" required>
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
                    <div class="row justify-content-center mb-4">
                        <button type="submit" style=" width:150px;height:50px;font-size: 20px;" class="btn  btn-primary">Tài liệu</button>            
                    </div>
                </div>
            </form>
        </div>
    <div class="col mt-3 " style="">
        <h5>Danh sách tài liệu </h5>
        <div class="card shadow-lg">
                <div class="card-content">                
                    <ul>
                        @foreach ($containDocs as $containDoc)
                        <li class="ml-2 mt-1 mr-2">
                           <div class="row">
                                <div class="col-lg-3" style="display: flex">
                                    <div class="col-lg-4">
                                        @if ($containDoc->nhanvien->HinhAnh == '')
                                        @if ($containDoc->nhanvien ->GioiTinh == 'Nam')
                                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @else
                                            <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                      @else
                                          <img src="{{ asset('./images/' . $containDoc->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                      @endif
                                    </div>
                                   <div class="col-lg-9">
                                        <p class="mt-2">
                                            {{$containDoc->nhanvien->Ho.' '.$containDoc->nhanvien->Ten}}
                                        </p>
                                        <p style="font-size:12px;">
                                            {{$containDoc->nhanvien->phongban->TenPhongBan}}
                                        </p>
                                   </div>
                                   
                                </div>
                                <div class="col-lg-2 mt-2">
                                    @switch(pathinfo($containDoc->TaiLieu, PATHINFO_EXTENSION))
                                    @case('docx')
                                        <img src="{{asset('./icons/word.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                    @case('xlsx')
                                        <img src="{{asset('./icons/excel.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                    @default
                                        <img src="{{asset('./icons/file.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                @endswitch
                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$containDoc->TaiLieu)}}'>  {{$containDoc->TaiLieu}}</a>
                                    {{-- <p>{{$containDoc->TaiLieu}}</p> --}}
                                </div>
                                <div class="col-lg-5 mt-2">
                                    {!! $containDoc->MoTa !!}
                                </div>
                                <div class="col-lg-2 mt-2">
                                    <?php
                                        \Carbon\Carbon::setLocale('vi'); 
                                        $timeNow=\Carbon\Carbon::parse($containDoc ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                                    ?>
                                    {{$timeNow}}
                                    {{-- <p>{{\Carbon\Carbon::parse($containDoc->ThoiGian)->format('d/m/Y H:m:s')}}</p> --}}
                                </div>
                           </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        <nav>
                            <ul class="pagination pagination-circle">
                                <li class="page-item ">{{ $containDocs->links() }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-3 shadow-lg">
        <div class="card text-center show-lg" style="border: 1px solid;">
            <div class="card-header" style="background-color: #008bcd;">
                <dt class="text-white">Lịch sử đã chia sẽ tài liệu</dt>
            </div>
            <div class="card-body shadow-lg">
                <table  class="DTtable table-striped table-bordered ">
                    <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                stt
                            </th>
                            <th class="w-25">
                                Tài liệu
                            </th>
                            <th class="w-30">
                                Mô tả
                            </th>
                            <th class="w-20">
                                Thời gian
                            </th>
                            <th class="w-5">
                                Thao Tác
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($containDocShareds as $stt => $containDocShared)                            
                        <tr>
                            <td class="justify-content-center">
                                {{++$stt}}
                            </td>
                            <td class="text-left">
                                @switch(pathinfo($containDocShared->TaiLieu, PATHINFO_EXTENSION))
                                    @case('docx')
                                        <img src="{{asset('./icons/word.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                    @case('xlsx')
                                        <img src="{{asset('./icons/excel.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                    @default
                                        <img src="{{asset('./icons/file.png')}}" alt="word" style="height: 15px;width: 15px;">
                                        @break
                                @endswitch
                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$containDocShared->TaiLieu)}}'>  {{$containDocShared->TaiLieu}}</a>
                            </td>
                            <td class="text-left">
                                {!! $containDocShared->MoTa !!}
                            </td>
                            <td class="justify-content-center">
                                <p>{{\Carbon\Carbon::parse($containDocShared->ThoiGian)->format('d/m/Y H:m:s')}}</p>
                            </td>
                            <td class="text-center mr-3">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                    </div>
                                </div>
                                {{-- start modal xóa  --}}
                                <form action="{{route('destroycontaineruser',['id'=>$containDocShared->Id_TaiLieu])}}" method="post">
                                    @csrf
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xóa tài liệu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ustify-content-center">
                                                <h4 style="color:red;">Bạn có chắc chắn xóa tài liệu này không ?</h4>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger">xóa</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </form>
                                {{-- end modal xóa --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection