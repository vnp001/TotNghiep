@extends('userindex')
@section('contentuser')
<style>
    .chata:hover {
   
   background-color: #b2b0b6;
   text-decoration:none;
   } */
   .an {
       white-space: nowrap; 
       width: 300px; 
       overflow: hidden;
       text-overflow: ellipsis; 
       }
</style>
<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-5 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                   
                </div>
                <div class="col-lg-4 mt-2">
                    <h2 style="color: #593bdb">Boxchat</h2>
                    
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">boxchat</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 " style="">
    <div class="mr-1 ml-1">    
        {{-- <div class=" row page-titles shadow-lg mx-0">
            <div class="col-sm-6 p-md-0">
                <h3>
                    <h3>Chat</h3>
                </h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="">chat</a></li>
                    <li class="breadcrumb-item active"><a href="">Chi tiết</a></li>
                </ol>
            </div>
        </div> --}}
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
                                        <form  method="post" action="{{route('createchat_user')}}" enctype="multipart/form-data">
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
                                                                <option value="">Phòng ban</option>
                                                                @foreach ($Departments as $Department)
                                                                    <option value="{{$Department->Id_PhongBan}}">{{$Department->TenPhongBan}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>                   
                                                    </div> 
                                                    <div id="nhanvien" class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Nhân viên</label>
                                                            <select  name="nhanvien" class="form-control"  id="" >
                                                                <option value="">Tên nhân viên</option>
                                                                @foreach ($employees as $employee)
                                                                    @if($employee->Id_PhanQuyen == session()->get('user_id'))
                                                                        <option  disabled value="{{$employee->Id_NhanVien}}" >{{$employee->Ho}} {{$employee->Ten}}</option>
                                                                    @else
                                                                        <option  value="{{$employee->Id_NhanVien}}" >{{$employee->Ho}} {{$employee->Ten}}</option>                                                                            
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>                   
                                                    </div>
                                                    {{-- <div class="d-flex text-left mb-2 align-items-center">
                                                        <div class="w-25 pl-2 mr-2">
                                                            <label class="my-auto">Chat</label>
                                                        </div>
                                                        <div class="w-75">
                                                            <select  name="nhanvien" class="form-control"  id="" >
                                                                <option value="">Nhân viên</option>
                                                                @foreach ($employees as $employee)
                                                                    @if ($employee->Id_NhanVien == session()->get('user_id'))
                                                                        <option disabled value="{{$employee->Id_NhanVien}}">{{$employee->Ho}} {{$employee->Ten}}</option>   
                                                                    @else
                                                                        <option  value="{{$employee->Id_NhanVien}}">{{$employee->Ho}} {{$employee->Ten}}</option>                                                                      
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
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
                           
                                @foreach ($chatBoxs as $chatBox)  
                                <a href="{{route('detailchat_user',['id'=>$chatBox->Id_ChatBox])}}" class="chata list-group-item ml-1 mr-1 ">  
                                    <div class="row">
                                        <div class="col-lg-0">
                                            <img src="{{ asset('./chatbox/'.$chatBox->HinhAnh)}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">                   
                                        </div>
                                        <div class="col-lg-10 ml-3">
                                            <div class="row">
                                                <h5>{{$chatBox->TenChatBox}}</h5>
                                            </div>
                                            <div class="row">
                                                <?php
                                                    $contentchat=App\Models\noidungchat::where('Id_ChatBox','=',$chatBox->Id_ChatBox)
                                                                                ->with('chatbox')
                                                                                ->with('nhanvien')
                                                                                ->latest('Id')->first();
                                                ?>
                                              
                                                 @if ($contentchat == null ||$contentchat->NoiDung == Null)
                                                        
                                                    @else
                                                        <div class="col-lg-6">
                                                            @if ($contentchat->Id_NhanVien == session()->get('user_id'))
                                                                <p class="an" style="color: #485058;">{{'Bạn:'.$contentchat->NoiDung}}</p>
                                                            @else
                                                                <p class="an" style="color: #485058;">{{$contentchat->nhanvien->Ten.':'.$contentchat->NoiDung}}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-6"><p style="color: black;font-size: 15px;">{{ Carbon\Carbon::parse($contentchat->ThoiGian)->format('h:m d/m/Y')}}</p></div> 
                                                    @endif                      
                                            </div>
                                        </div>
                                    </div> 
                                </a>                            
                                @endforeach 
                            
                            
                           </div>
                        </div>
                    </div>
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
// $(document).ready(function(){ 
//     setInterval(function(){
//         $('#loadchatboxs').load('/user/chat/loadchatbox');
//         }, 500);
//     });
        
</script> 
@endsection