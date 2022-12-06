<style>
       #test{
           
            height:200px;
            overflow-x:hidden;
            overflow-y:auto;
        }
        .upload{
  width: 100px;
  position: relative;
  margin: auto;
}

.upload img{
  border-radius: 50%;
  border: 6px solid #eaeaea;
}

.upload .round{
  position: absolute;
  bottom: 0;
  right: 0;
  background: #00B4FF;
  width: 32px;
  height: 32px;
  line-height: 33px;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
}

.upload .round input[type = "file"]{
  position: absolute;
  transform: scale(2);
  opacity: 0;
}

input[type=file]::-webkit-file-upload-button{
    cursor: pointer;
}

</style>
<div class="header" style="background-color: #343957">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        {{-- <h2 class="mt-1">Quản trị nhân sự trường Đại Học Quy Nhơn </h2> --}}
                        <!-- <div class="dropdown-menu p-0 m-0">

                        </div> -->
                    </div>
                </div>
                <ul class="navbar-nav header-right"> 
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                              <!-- START ICON THÔNG BÁO hộp thoại -->       
                            {{-- <i class="mdi mdi-email" style="background-color: white"></i> --}}
                            {{-- <i class="mdi mdi-email-outline " ></i> --}}
                            <i class="mdi mdi-facebook-messenger" style="color:white"></i>
                            <div class="pulse-css" style="background-color:red"></div> 
                        </a>
                          <!-- START chats -->    
                      
                        <div class="dropdown-menu dropdown-menu-right">
                            <h4 class="mt-2 ml-2">Các nhóm chats</h4>
                            <ul class="list-unstyled" style="overflow-y:auto; height: 400px;">
                                <div id="loaddatachatboxheader" style="width: 500px;"></div>
                            </ul>
                            
                            <a class="all-notification text-dark" href="{{ route('chat_user') }}">Xem tất cả box chat <i
                                    class="ti-arrow-right"></i></a>
                        </div>
                          <!-- END chats -->    
                    </li>           
                    
                    
                    <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    
                                {{-- <i class="mdi mdi-bell" style="background-color: white"></i> --}}
                                <i class="mdi mdi-bell-outline " style="color:white"></i>
                                <!-- START ICON THÔNG BÁO -->
                                     {{-- {{ $notify}} --}}
                                     {{-- @if ($notifyuser) --}}
                                        <div class="pulse-css" style="background-color:red"></div> 
                                     {{-- @endif --}}
                               
                                 <!-- END ICON THÔNG BÁO -->
                            </a>
                             <!-- START CÁC TIN THÔNG BÁO -->    
                            <div class="dropdown-menu dropdown-menu-right">
                                <h4 class="mt-2 ml-2">Thông báo</h4>
                                <ul class="list-unstyled" style="overflow-y:auto; height: 400px;">
                                    @foreach ($notifyuser as $valuenotify)
                                        <li class="media dropdown-item">
                                            {{-- @foreach ($valuenotify->nhanvien as $valueemployee) --}}
                                            <img src="{{ asset('./images/'.$valuenotify->nguoigui->HinhAnh)}}" style="width:120px;height:50px;border-radius: 50%;" alt="">
                                            <div class="media-body ml-3">
                                                <a href="#" >
                                                    <p ><strong>{{$valuenotify->nguoigui->Ten}}</strong> {{$valuenotify->NoiDung}} </p>
                                                </a>
                                            </div>
                                        <span class="notify-time">
                                            <?php
                                                \Carbon\Carbon::setLocale('vi'); 
                                                $timeNow=\Carbon\Carbon::parse($valuenotify ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                                            ?>
                                            {{$timeNow}}
                                        </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- END CÁC TIN THÔNG BÁO -->
                                
                                {{-- <a class="all-notification text-dark" href="">See all notifications <i
                                        class="ti-arrow-right"></i></a> --}}
                            </div>
                        </li>
                       
                      
                        
                        {{-- Tài Khoản start --}}
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" data-target="#login_dropdown">
                                <span>
                                     {{-- Check hình ảnh  với tên đnăg nhập --}}
                                     @foreach ($datauser as $value)
                                      <img class=" mr-2" src="{{ asset('./images/' . $value ->HinhAnh) }}" alt="">
                                        {{ $value->Ten}}
                                </span>
                            </a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" id="login_dropdown"> -->
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="d-flex flex-column " style="border-bottom: 2px dashed #ccc;">
                                    <div class="upload">
                                        <img src="{{ asset('./images/' . $value ->HinhAnh) }}" style="height: 100px;width: 100px;border-radius: 50%;" alt="">
                                      </div>
                                      <form action="{{route('updateimage_user')}}" method="post" enctype="multipart/form-data">
                                        @csrf      
                                        {{-- <div class="round">
                                            <input type="file" name="hinhanh" class="hinhanh" value="">
                                            <i class = "fa fa-camera" style = "color: #fff;"></i>
                                        </div>     --}}
                                        <input type="file" value="font-size:20px" style="" class="ml-2 mb-2" name="hinhanh" required>
                                        <div class="d-flex justify-content-end mr-3">
                                            <input class="justify-content-end btn btn-secondary"  type="submit" style="" value="Cập nhập">
                                        </div>
                                    </form>
                                      {{-- <div> --}}
                                        {{-- <input type="submit" value="Đổi hình ảnh"> --}}

                                    {{-- </div> --}}
                                    <p class="ml-4 mt-3 text-center" style="font-size: 20px;">
                                    {{ $value->Ho.' '.$value->Ten}}
                                    </p>
                                </div>
                                <a id="manage" href="{{route('profileuser')}}" title="Thông tin cá nhân" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Thông tin cá nhân</span>
                                </a>
                                {{-- <a id="manage" href="" title="Đổi mật khẩu" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Đổi mật khẩu</span>
                                </a> --}}
                                <a href="{{route('changepassuser')}}" id="manage" class="dropdown-item" data-toggle="modal" data-target="#modalEdit-doimk">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Đổi mật khẩu</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('logoutuser')}}">   
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span class="ml-2">Đăng xuất</span>
                                </a>
                            </div>
                        </li>
                         {{-- Tài Khoản end --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
          <!-- START MODEL ĐỔI MẬT KHẨU-->
          <div class="w-50 d-flex justify-content-end">
            <div class="modal fade" id="modalEdit-doimk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                    {{-- START FORM --}}
                    <form  method="get" action="{{route('changepassuser')}}">
                        <div class="modal-content p-3" style="width: 550px;">
                            <div class="flex-row d-flex justify-content-center mb-2">
                                <h2 class="text-info">Đổi mật khẩu</h2>
                            </div>
                            <input type="hidden" name="idnhanvien" class="form-control"  />
                            <div class="d-flex flex-column w-auto mt-3">
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Mật khẩu cũ</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="password"  class="form-control" disabled value="{{$value->MatKhau}}"/>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Mật khẩu mới</label><b class="text-danger">*</b>
                                    </div>
                                    <div class="w-75">
                                        <input type="password" name="matkhaumoi"  class="form-control" required/>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">nhập lại mật khẩu</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="password" name="nhaplaimk" class="form-control"required/>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                    <div class="w-25 mr-2"></div>
                                    <div class="w-75 d-flex">
                                        <input type="submit" name="btn" class="btn btn-success w-40" value="Đổi mật khẩu">
                                        <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                        <!-- <button id= "btnCreate" type="submit" class="btn btn-primary w-50" onclick="return validateInput()">Thêm</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    {{-- END FORM --}}
                </div>
            </div>
        </div>
  
<!-- END MODEL ĐỔI MẬT KHẨU -->
<script type="text/javascript">
    $(document).ready(function(){ 
        setInterval(function(){
        $('#loaddatachatboxheader').load('/user/chat/loadchatbox');
        }, 500);
    });
</script>