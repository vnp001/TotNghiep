<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập</title>
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

        <!-- font awesome  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->

    <body style="background-color: #7B68EE;">
        <div class="container-fluid vh-50 mt-5"  >
            <div class="" style="margin-top: 15px;">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light" style="border-radius: 10px;">
                        <div class="text-center" style="margin-bottom: 70px;">
                            <img src="{{ asset('/Images/cntt_ico_n.png') }}"  style="height: 150px;width: 150px;" alt="">
                            <h3 class="text-primary" style="margin-top: 40px;">ĐĂNG NHẬP</h3>
                        </div>
                        <form action="{{route('login')}}" method="post">
                            {{ csrf_field() }}

                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                        <input type="text" @if( Cookie::has('tentaikhoan')) value="{{Cookie::get('tentaikhoan')}}"@endif name="taikhoantxt" class="form-control"   placeholder="Tên tài khoản">  
                                </div>
                                @error('taikhoantxt')
                                    <div class="input-group  ml-5 mt-2" >
                                        <p style="color: red">Bạn chưa nhập tên tài khoản !!!</p>
                                    </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                            <input type="password" id="password" @if( Cookie::has('matkhau'))  value="{{Cookie::get('matkhau')}}" @endif name="matkhautxt" class="form-control"  placeholder="Mật khẩu">  
                                    <span class="input-group-text" style="cursor: pointer" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                </div>
                                @error('matkhautxt')
                                    <div class="input-group  ml-5 mt-2" >
                                        <p style="color: red">Bạn chưa nhập mật khẩu !!!</p>
                                    </div>
                                @enderror
								<div class="input-group  ml-5 mt-4 mb-1" >
									<input type="checkbox" @if(Cookie::has('tentaikhoan')) checked @endif style="width: 1.25rem;height: 1.25rem;" name="ghinho" >
									<span class="ml-3">Ghi nhớ đăng nhập </span>
                                </div>
                                {{-- check điều kiện nhập sai tk --}}
                                <div class="input-group  ml-5 mt-2" >
                                    @if ( Session::has('error') )
                                        <p style="color: red">{{ Session::get('error') }}</p>
                                    @endif
                                </div>
                                
                                {{-- <div class="container"> --}}
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
        
    </body>

</html>
<script>
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
