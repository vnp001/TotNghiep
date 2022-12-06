<style>
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
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        {{-- <h2 class="mt-1">Quản trị nhân sự trường Đại Học Sư Phạm HCM</h2> --}}
                        <!-- <div class="dropdown-menu p-0 m-0">

                        </div> -->
                    </div>
                </div>
                <ul class="navbar-nav header-right">   
                    
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                              <!-- START ICON THÔNG BÁO hộp thoại -->       
                            {{-- <i class="mdi mdi-email"></i> --}}
                        
                            <i class="mdi mdi-facebook-messenger"></i>
                            <div class="pulse-css"></div> 
                        </a>
                          <!-- START chats -->    
                        
                        <div class="dropdown-menu dropdown-menu-right">
                            <h4 class="mt-2 ml-2">Các nhóm chats</h4>
                            <ul class="list-unstyled" style="overflow-y:auto; height: 400px;">
                                <div id="loaddatachatbox" style="width: 500px;"></div>
                                {{-- @foreach ($chatBoxs as $chatBox)  
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
                                @endforeach  --}}
                            
                            </ul>
                            <a class="all-notification" style="color: black" href="{{route('chat_admin')}}">Tất cả chats<i
                                class="ti-arrow-right"></i></a>
                        </div>
                          <!-- END chats-->    
                    </li>              
                    <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    
                                <i class="mdi mdi-bell"></i>
                              
                                <!-- START ICON THÔNG BÁO -->
                                     {{-- {{ $notify}} --}}
                                  
                                        <div class="pulse-css"></div> 
                                   
                               
                                 <!-- END ICON THÔNG BÁO -->
                            </a>
                             <!-- START CÁC TIN THÔNG BÁO -->    
                            <div class="dropdown-menu dropdown-menu-right">
                                <h4 class="mt-2 ml-2">Thông báo</h4>
                                <ul class="list-unstyled" style="overflow-y:auto; height: 400px;">
                                    @foreach ($notifyadmin as $valuenotify)
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
                                    {{-- @endforeach --}}
                                        
                                            {{-- <span class="success"><i class="ti-user"></i></span> --}}
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- END CÁC TIN THÔNG BÁO -->
                                
                                <a class="all-notification" style="color:black " href="{{route('request')}}">Tất cả thông báo <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </li>
                         
                        {{-- Tài Khoản start --}}
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" data-target="#login_dropdown">
                                <span>
                                     {{-- Check hình ảnh  với tên đnăg nhập --}}
                                     @foreach ($dataadmin as $value)
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
                                      <form action="{{route('updateimage_admin')}}" method="post" enctype="multipart/form-data">
                                        @csrf      
                                        {{-- <div class="round">
                                            <input type="file" name="hinhanh" class="hinhanh" value="">
                                            <i class = "fa fa-camera" style = "color: #fff;"></i>
                                        </div>     --}}
                                        <input type="file" value="font-size:20px" style="" name="hinhanh" required>
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
                                <a id="manage" href="{{route('profileadmin')}}" title="Thông tin cá nhân" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Thông tin cá nhân</span>
                                </a>
                                <a href="" id="manage" class="dropdown-item" data-toggle="modal" data-target="#modalEdit-doimk">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Đổi mật khẩu</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('logoutadmin')}}">   
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
                    <form  method="get" action="{{route('changepassadmin')}}">
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
    $('#loaddatachatbox').load('/admin/chat/loadchatbox');
    }, 500);

    // $('.hinhanh').change(function(){
    //     $hinhanh=$('.hinhanh').val();
    //     $.ajax({
    //     type : 'get',
    //     url : '/admin/updateimage',
    //     data:{
    //         'hinhanh':$hinhanh,
    //         },
    //     dataType: 'json', 
    //     encode  : true,
    //         success:function(data){
    //             // $('#textinput').val("");
    //             // console.log(data)
    //             console.log("sucess");
    //         },
    //         error:function(){ 
    //                 console.log("Error!!!!");
    //         }
        
    //     });
    // });
    });

</script> 
    