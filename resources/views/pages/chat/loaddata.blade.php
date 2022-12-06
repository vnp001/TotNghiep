<style>
    	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}
</style>
@foreach ($chats as $chat)
    @if ($chat->NoiDung != null)
        @if ($chat->Id_NhanVien == session()->get('admin_id') || $chat->Id_NhanVien == session()->get('user_id'))
            {{-- các nhân --}}
            <div class="d-flex justify-content-end mt-3" >
                <div class="msg_cotainer ml-3 " style="background-color: aqua">
                    <div class="m-2">
                        {{$chat->NoiDung}}<br>
                        <span class="msg_time ">
                        <?php
                            \Carbon\Carbon::setLocale('vi'); 
                            $timeNow=\Carbon\Carbon::parse($chat ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                        ?>
                        {{$timeNow}}    
                        </span>
                        {{-- {{
                        \Carbon\Carbon::parse($chat->ThoiGian)->format('H : m').' , '.\Carbon\Carbon::parse($chat->ThoiGian)->format('l')}}</span> --}}
                    </div>
                </div>
                <div class="img_cont_msg">
                    <img src="{{ asset('./images/'.$chat->nhanvien->HinhAnh)}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">                   
                </div>
            </div>   
        @else
            {{-- người khác --}}
            <div class="card-body msg_card_body">
                <div class="d-flex justify-content-start" >
                    <div class="img_cont_msg">
                        <img src="{{ asset('./images/'.$chat->nhanvien->HinhAnh)}}"  style=" width:50px;height:50px;border-radius: 50%;" alt="">                   
                    </div>
                    <div class="msg_cotainer ml-3" style="background-color: aqua;">
                        <div class="m-2">
                            {{$chat->NoiDung}}<br>
                            <span class="msg_time ">
                                <?php
                                    \Carbon\Carbon::setLocale('vi'); 
                                    $timeNowAnother=\Carbon\Carbon::parse($chat ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                                ?>
                                {{$timeNowAnother}}    
                                </span>
                            {{-- <span class="msg_time ">{{\Carbon\Carbon::parse($chat->ThoiGian)->format('H : m').' , '.\Carbon\Carbon::parse($chat->ThoiGian)->format('l')}}</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif        
    @endif
@endforeach