@extends('index')
@section('content')
 <style>
     .an {
    display: block;
  	display: -webkit-box;
  	font-size: 20px;
  	line-height: 1.9;
  	-webkit-line-clamp: 2;  /* số dòng hiển thị */
  	-webkit-box-orient: vertical;
  	overflow: hidden;
  	/* text-overflow: ellipsis; */
}
 </style>
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Danh sách văn bản</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('document')}}">văn bản</a></li>
                {{-- <li class="breadcrumb-item active"><a href="{{route('typedoc')}}">loại văn bản</a></li> --}}
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

    {{-- FORM văn bản--}}
    <div class="row ml-1 " style="margin-top: -25px">
       <div class="card">
           <div class="ml-2 mb-3 mt-2">
             <a href="{{route('createdoc')}}"  class="btn btn-primary"><img src="{{asset('./Images/addbutton.png')}}" style="height: 25px; width: 25px;" alt="">  Tạo văn bản</a>
           </div>
            <table class="table table-striped table-bordered" style="wilth:auto;" >
                <thead class="text-center text-nowrap thead-light">
                <tr>
                    <th class="w-5">
                        Số VB
                        </th>
                    <th class="w-10">
                        Loại văn bản
                    </th>
                    <th class="w-20">
                        Tên văn bản
                    </th>
                    <th class="w-30">
                        Nội dung
                    </th>
                    <th class="w-15">
                        Người kí
                    </th>
                    <th class="10">
                        Xem
                    </th>
                    <th class="w-10">
                        Thao tác
                    </th>
                </tr>
                </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td style=" text-align: center ">
                        {{$document->soVB}}
                    </td>
                    <td>
                        {{$document->loaivanban->TenLoaiVanBan}}
                    </td>
                    <td>
                        {{$document->TenVanBan}}
                    </td>
                    <td class="an">
                       {!!$document->NoiDung!!}
                    </td>
                    <td style="text-align: center">
                        {{$document->nhanvien->Ho}} {{$document->nhanvien->Ten}}
                    </td>
                    <td style=" text-align: center ">
                        <a href="/admin/document/detail/{{$document->Id_VanBan}}" class="btn btn-rounded btn-info"><i class="mdi mdi-file-document"></i></a>
                    </td>
                    <td  style=" text-align: center ">
                        <div style="display: flex">
                            @method('DELETE')
                                @csrf
                            <a href="/admin/document/delete/{{$document->Id_VanBan}}" class="btn btn-danger">Xóa</a>
                            <a href="/admin/document/edit/{{$document->Id_VanBan}}" class="btn btn-info ml-2" >Sửa</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
       </div>
    </div>
    {{-- END Form văn bản --}}
      
</div>

@endsection 