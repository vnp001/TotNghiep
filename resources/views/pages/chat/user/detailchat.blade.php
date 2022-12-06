@extends('userindex')
@section('contentuser')
@if ( Session::has('success') )
<div class="col-lg-12">
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
</div>

<div class="row">
    <div class="col-lg-1"></div>
    @foreach ($chatBoxs as $chatBox)    
    <div class="col-lg-10 mt-4">
        {{-- <div class="read-content"> --}}
            <div class="read-content">
                <div class="card shadow-lg">
                    <div class="card-header" style="background-color: #00c5fd">
                        <div class="row col-lg-12">
                            <div class="col-lg-0">
                                <a href="#" onclick="history.back()"><i class="mdi mdi-keyboard-backspace" style="color: white;font-size:30px;"></i></a>
                            </div>
                            <div class="col-lg-1 ml-3">
                                <img src="{{ asset('./chatbox/'.$chatBox->HinhAnh)}}"  style="width:60px;height:60px;border-radius: 50%;" alt="">                   
                            </div>
                            <div class="col-lg-9 text-left ml-3">
                                <h4 class="text-white mt-2">{{$chatBox->TenChatBox}} </h4>
                            </div>
                            <div class="col-lg-1 text-right ml-3">
                                <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalAdd" ><i class="mdi mdi-account-box-outline"></i> Thêm</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                </div>
                                {{-- <a href="" style="color: white;"data-toggle="modal" data-target="#modalEdit"><i class="mdi mdi-border-color" style="font-size:30px"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-content ml-1 mr-1 " style="overflow-y:auto; height: 400px;">
                        <div class="read-content-body ">
                            <div id="loaddata"></div>
                        </div>
                    </div>
                    <div class="d-flex text-left mb-2 mt-3 align-items-center">
                        <div class="w-20"></div>
                        <div class="w-100">
                            <textarea class="form-control"  id="textinput" placeholder="Aa" style=" border: auto;border-radius: 10px;" name="text"></textarea>
                        </div>
                        <div class="my-auto ml-4 w-20">
                            {{-- <a href="{{route('storechat_user')}}">Gửi</a> --}}
                            <button class="btn btn-primary btn-sl-sm" id="send" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-2"></div>
    </div> 
</div>
<!-- START MODEL thêm  nhân viên-->
<div class="w-50 d-flex justify-content-end">
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
            {{-- START FORM --}}
            <form  method="post" action="{{route('addchat_user')}}">
                @csrf
                <div class="modal-content p-3" style="width: 550px;">
                    {{-- <input type="hidden" name="" class="form-control"/> --}}
                    <div class="d-flex flex-column w-auto mt-3">
                        <div class="d-flex text-left mb-2 align-items-center">
                            <div class="w-25 pl-2 mr-2">
                                <label class="my-auto">Nhân viên</label>
                            </div>
                            <div class="w-75">
                                <select name="nhanvienadd" id="" class="form-control">
                                    <option value="">Nhân viên</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->Id_NhanVien}}">{{$employee->Ho.' '.$employee->Ten}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="tennhom" value="{{$chatBox->TenChatBox}}" class="form-control"  /> --}}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                            <div class="w-25 mr-2"></div>
                            <div class="w-75 d-flex">
                                <input type="submit" name="btn" class="btn btn-success w-40" value="Thêm">
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

<!-- START MODEL SỬA Tên nhóm-->
<div class="w-50 d-flex justify-content-end">
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
            {{-- START FORM --}}
            <form  method="post" action="{{route('updatechat_user',['id'=>$chatBox->Id_ChatBox])}}">
                @csrf
                <div class="modal-content p-3" style="width: 550px;">
                    {{-- <input type="hidden" name="" class="form-control"/> --}}
                    <div class="d-flex flex-column w-auto mt-3">
                        <div class="d-flex text-left mb-2 align-items-center">
                            <div class="w-25 pl-2 mr-2">
                                <label class="my-auto">Tên nhóm</label>
                            </div>
                            <div class="w-75">
                                <input type="text" name="tennhom" value="{{$chatBox->TenChatBox}}" class="form-control"  />
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
<input type="hidden" value="{{session()->get('user_id')}}" id="nhanvien" name="nhanvien">
<input type="hidden" value="{{$chatBox->Id_ChatBox}}" id="idchat" name="idchat">

{{-- END MODAL --}}
@endforeach

<div class="col-lg-1">
</div>
   
<script type="text/javascript">
$(document).ready(function(){   
    let id=$('#idchat').val();
    setInterval(
        function(){
            $('#loaddata').load("/user/chat/load/" +id
                );
        }, 500);

        $('#send').on('click',function(){
        $text=$('#textinput').val();
        $nhanvien=$('#nhanvien').val();
        $boxchat=$('#idchat').val();
        $.ajax({
        type : 'get',
        url : '/user/chat/store',
        data:{
            'text':$text,
            'nhanvien':$nhanvien,
            'idchat':$boxchat
            },
        dataType: 'json', 
        encode  : true,
            success:function(data){
                $('#textinput').val("");
                // console.log(data)
                console.log("sucess");
            },
            error:function(){ 
                    console.log("Error!!!!");
            }
        
        });
    });
});
</script>  
@endsection