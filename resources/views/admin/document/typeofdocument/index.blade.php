@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Loại văn bản </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('document')}}">văn bản</a></li>
                <li class="breadcrumb-item active"><a href="{{route('typedoc')}}">loại văn bản</a></li>
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

    {{-- FORM loại đào tạo--}}
    <div class="row " style="margin-top: -25px">
       <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('storetypedoc')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Loại văn bản</label>
                                <input type="text" class="form-control" name="tenloaivanban" value="" placeholder="Loại đào tạo" required>
                            </div>                   
                        </div>
                        <button type="submit" style="margin-left: 300px; width:100px;height:40px;font-size: 20px;" class="btn  btn-primary">Lưu</button>
                    </form>
                </div>
            </div>   
       </div>
       <div class="col-lg-7">
           <div class="card">
               <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="text-center text-nowrap thead-light">
                    <tr>
                        <th class="w-5">
                            Mã LVB
                        </th>
                        <th class="">
                            Loại văn bản
                        </th>
                        <th class="w-25">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($typedoc as $valuetypedoc)
                        <tr>
                            <td style=" text-align: center ">
                                {{$valuetypedoc->Id_LoaiVanBan}}
                            </td>
                            <td>
                                {{$valuetypedoc->TenLoaiVanBan}}
                            </td>
                            <td  style=" text-align: center ">
                                <div style="display: flex">
                                    {{-- @method('DELETE') --}}
                                    <form method="post" action="/admin/document/typeofdocument/delete/{{$valuetypedoc ->Id_LoaiVanBan}}">
                                        @csrf
                                        <input type="hidden" name="Id_loaivanban" value="{{$valuetypedoc->Id_LoaiVanBan}}">
                                        <button class="btn btn-danger">Xóa</button>
                                    </form>
                                        <button data-toggle="modal" data-target="#modalEdit-{{$valuetypedoc->Id_LoaiVanBan}}" class="btn btn-info ml-2" >Sửa</button>
                                </div>
                            </td>
                        </tr>
                    <!-- START MODEL SỬA LOẠI VĂN BẢN-->
                    <div class="w-50 d-flex justify-content-end">
                        <div class="modal fade" id="modalEdit-{{$valuetypedoc->Id_LoaiVanBan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                {{-- START FORM --}}
                                <form  method="post" action="{{route('edittypedoc')}}">
                                    @csrf
                                    <div class="modal-content p-3" style="width: 550px;">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Sửa loại đào tạo</h2>
                                        </div>
                                        <input type="hidden" name="idloaivanban" class="form-control" value="{{$valuetypedoc->Id_LoaiVanBan}}"/>
                                        <div class="d-flex flex-column w-auto mt-3">
                                            <div class="d-flex text-left mb-2 align-items-center">
                                                <div class="w-25 pl-2 mr-2">
                                                    <label class="my-auto">Loại văn bản</label>
                                                </div>
                                                <div class="w-75">
                                                    <input type="text" name="tenloaivanban"  class="form-control" value="{{$valuetypedoc->TenLoaiVanBan}}" />
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                <div class="w-25 mr-2"></div>
                                                <div class="w-75 d-flex">
                                                    <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                    <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                    <!-- <button id= "btnCreate" type="submit" class="btn btn-primary w-50" onclick="return validateInput()">Thêm</button> -->
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                        {{-- END MODAL LOẠI VĂN BẢN --}}
                        @endforeach
                </tbody>
                </table>
               </div>
           </div>
       </div>
    </div>
    {{-- END Form loại đào tạo --}}
      
</div>
@endsection 