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
                                    <div  style="color: #485058; white-space: nowrap; 
                                    width: 150px; 
                                    overflow: hidden;
                                    text-overflow: ellipsis;">{{'Bạn:'.$contentchat->NoiDung}}</div>
                                    {{-- <p class="an" style="color: #485058;">{{'Bạn:'.$contentchat->NoiDung}}</p> --}}
                                @else
                                    <div class="an"style="color: #485058; white-space: nowrap; 
                                    width: 150px; 
                                    overflow: hidden;
                                    text-overflow: ellipsis;">{{$contentchat->nhanvien->Ten.':'.$contentchat->NoiDung}}</div>
                                    {{-- <p class="an" style="color: #485058;">{{$contentchat->nhanvien->Ten.':'.$contentchat->NoiDung}}</p> --}}
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <p style="color: black;font-size: 15px;">
                                    <?php
                                        \Carbon\Carbon::setLocale('vi'); 
                                        $timeNow=\Carbon\Carbon::parse($contentchat ->ThoiGian)->diffForHumans(\Carbon\Carbon::now());
                                    ?>
                                    {{$timeNow}}   
                                    {{-- {{ Carbon\Carbon::parse($contentchat->ThoiGian)->format('h:m d/m/Y')}} --}}
                                </p>
                            </div> 
                        @endif                      
                </div>
            </div>
        </div> 
    </a>                            
    @endforeach 

