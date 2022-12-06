@extends('index')
@section('content')
<style>
     .chata:hover {
    background-color: #b2b0b6;
    text-decoration:none;
    } 
    .an {
        white-space: nowrap; 
        width: 300px; 
        overflow: hidden;
        text-overflow: ellipsis; 
        }
</style>
<div class="mr-1 ml-1">    
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>
                <h3>Chat</h3>
            </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">chat</a></li>
                {{-- <li class="breadcrumb-item active"><a href="">Chi tiết</a></li> --}}
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
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="email-left-box px-0 mb-5 col-lg-4">
                    <div class="mail-list mt-4" style="width: auto;height: auto;">
                        <a href="#">
                            <ul class="list-group-item">
                                <li>
                                    <div class="row" >
                                        <div class="col-lg-2">
                                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">                   
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <h4>Nhóm 1</h4>
                                            </div>
                                            <div class="row">
                                                <p>nội dung Liên tục những ....</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </a>
                        <a href="#">
                            <ul class="list-group-item">
                                <li>
                                    <div class="row" >
                                        <div class="col-lg-2">
                                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">                   
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <h4>Nhóm 1</h4>
                                            </div>
                                            <div class="row">
                                                <p>nội dung Liên tục những ....</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </a>
                        <div class="list-group-item">
                            <div class="row" >
                                <div class="col-lg-2">
                                    <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">                   
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <h4>Nhóm 2</h4>
                                    </div>
                                    <div class="row">
                                        <p>nội dung Liên tục những ....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                    <div class="col-lg-12">
                        <div class="email-list mt-4">
                            <div>
                                <h1>test</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   --}}
   <div class="row">
    <div class="col-lg-12">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mail-list shadow-lg " style="overflow-y:auto;   overflow-x:hidden;height: 650px;">
                            <div class="row mt-2 ml-2 mb-3">
                                <div class="col-lg-10"><h4>Chats</h4></div>
                                <div class="col">
                                    <button data-toggle="modal" data-target="#modeladd" class="btn btn-secondary" ><i class="mdi mdi-facebook-messenger"></i> Tạo nhóm chat</button>
                                </div>
                            </div>

                        <!-- START MODEL SỬA Tên nhóm-->
                        <div class="w-50 d-flex justify-content-end">
                            <div class="modal fade" id="modeladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                    {{-- START FORM --}}
                                    <form  method="post" action="{{route('createchat')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content p-3" style="width: 550px;">
                                            {{-- <input type="hidden" name="" class="form-control"/> --}}
                                            <div class="col d-flex justify-content-center">
                                                <h3>Tạo cuộc trò chuyện</h3>
                                            </div>
                                            <div class="d-flex flex-column w-auto mt-3">
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-25 pl-2 mr-2">
                                                        <label class="my-auto">Tên nhóm chat</label>
                                                    </div>
                                                    <div class="w-75">
                                                        <input type="text" name="tennhom" value="" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-20"></div>
                                                    <div class="w-5">
                                                        <input type="radio" onclick="check()" id="cbphongban"  class="check" value="phongban"  name="checkchon" style="width: 1em; height: 1em;" required>
                                                    </div>
                                                    <div class="w-30 pl-2 mr-2">
                                                        <label class="my-auto">Phòng ban</label>
                                                    </div>
                                                    <div class="w-5">
                                                        <input type="radio" onclick="check()" class="check" id="cbnhanvien" value="nhanvien" name="checkchon" style="width: 1em; height: 1em;">
                                                    </div>
                                                    <div class="w-40 pl-2 mr-2">
                                                        <label class="my-auto">Khác</label>
                                                    </div>
                                                </div>  
                                                    <div id="phongban" class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Phòng ban</label>
                                                            <select  name="phongban" class="form-control"  id="" >
                                                                <option value="">Tên phòng ban - Trưởng phòng</option>
                                                                @foreach ($Departments as $Department)
                                                                    <option value="{{$Department->Id_PhongBan}}">{{$Department->TenPhongBan.' - '.$Department->NguoiQuanLy}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>                   
                                                    </div> 
                                                    <div id="nhanvien" class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Nhân viên</label>
                                                            <select  name="nhanvien" class="form-control"  id="" >
                                                                <option value="">Mã nhân viên - Tên nhân viên</option>
                                                                @foreach ($employees as $employee)
                                                                    @if($employee->Id_PhanQuyen == session()->get('admin_id'))
                                                                        <option  disabled value="{{$employee->Id_NhanVien}}" >{{$employee->Ho}} {{$employee->Ten}}</option>
                                                                    @else
                                                                        <option  value="{{$employee->Id_NhanVien}}" >{{$employee->Ho}} {{$employee->Ten}}</option>
                                                                    
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>                   
                                                    </div>
                                                    <div class="d-flex text-left mb-2 align-items-center">
                                                        <div class="w-25 pl-2 mr-2">
                                                            <label class="my-auto">Hình ảnh</label>
                                                        </div>
                                                        <div class="w-75">
                                                            <input type="file" accept=".jpg, .png" name="hinhanh" value="" class="form-control"  />
                                                        </div>
                                                    </div>
                                                <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                    <div class="w-25 mr-2"></div>
                                                    <div class="w-75 d-flex">
                                                        <input type="submit" name="btn" class="btn btn-success w-40" value="Tạo ">
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
                        {{-- END MODAL --}}


                        <div id="loaddatachatboxs"></div>
                       
                          
                       </div>
                    </div>
                    {{-- <div class="col-lg-7">
                            <div class="read-content">
                                <div class="card shadow-lg">
                                    <div class="card-header" style="background-color: #00c5fd">
                                        <div class="row col-lg-12">
                                            <div class="col-lg-">
                                                <img src="{{ asset('./images/hinhanh.jpg')}}"  style="width:60px;height:60px;border-radius: 50%;" alt="">                   
                                            </div>
                                            <div class="col-lg-9 text-left">
                                                <h4 class="text-white">Nhóm 1 </h4>
                                            </div>
                                            <div class="col-lg-1 text-right">
                                                <a href="" style="color: white;"data-toggle="modal" data-target="#modalEdit"><i class="mdi mdi-border-color" style="font-size:30px"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content ml-1 mr-1 " style="overflow-y:auto; height: 500px;">
                                        <div class="read-content-body ">
                                            <div id="loaddata"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex text-left mb-2 mt-3 align-items-center">
                                        <div class="w-20"></div>
                                        <div class="w-100">
                                            <textarea class="form-control" cols="1" rows="1" id="textinput" placeholder="Aa" style=" border: auto;border-radius: 10px;" name="text"></textarea>

                                             <textarea name="" id=""  rows="10"></textarea> 
                                            <input type="text" class="form-control" id="textinput" placeholder="Aa" style=" border: auto;border-radius: 10px;" name="text">
                                        </div>
                                        <div class="my-auto ml-4 w-20">
                                            <button class="btn btn-primary btn-sl-sm" id="send" type="button">Send</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
   

  

<script type="text/javascript">
    window.onload = function() {
        document.getElementById("phongban").style.display = 'none';
        document.getElementById('nhanvien').style.display = 'none';
    }
    function check()
    {
        var cbphongban=document.getElementById("cbphongban");
        var cbnhanvien=document.getElementById("cbnhanvien");
        var inputphongban=document.getElementById("phongban");
        var inputnhanvien=document.getElementById("nhanvien");
        if(cbphongban.checked)
        {
            inputphongban.style.display="block";
            inputnhanvien.style.display="none";
        }
        else
        {
            inputnhanvien.style.display="block";
            inputphongban.style.display="none";
        }
    }
    setInterval(function(){
        $('#loaddatachatboxs').load('/admin/chat/loadchatbox');
        }, 500);
</script>
@endsection