<table class="table table-striped table-bordered ">
    <thead class="text-center text-nowrap thead-light">
       <tr>
          <th class="w-30">
            Nhân viên
          </th>
          <?php
            for($i=$firstOfMonth;$i<=$endOfMonth;$i++)
            {
              ?>
                <th>
                  <div>
                    <?php echo \Carbon\Carbon::parse($i)->format('d');?>
                  </div>
                  <div>
                    <?php echo \Carbon\Carbon::parse($i)->format('l');?>
                  </div>
                </th>
              <?php
            }
          ?>
          <th>
            Tổng ngày làm
          </th>
       </tr>
     </thead>
     <tbody>
          <?php
          foreach($employees as $employee)
          {
            ?>
            <tr>
                <td style="display: flex;">
                      @if ($employee->HinhAnh == '')
                        @if ($employee ->GioiTinh == 'Nam')
                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                        @else
                            <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                        @endif
                      @else
                          <img src="{{ asset('./images/' . $employee->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                      @endif
                      <p class="ml-2 mt-2">
                        <?php 
                        echo $employee->Ho.' '.$employee->Ten;
                       ?>
                      </p>
                </td>
                <?php
                
                for($i=$firstOfMonth;$i<=$endOfMonth;$i++)
                  {
                    $sumDateWork=App\Models\chamcong::where('Id_NhanVien','=',$employee->Id_NhanVien)
                                                    ->where('Ngay','>=',$firstOfMonth)
                                                    ->where('Ngay','<=',$endOfMonth)
                                                    ->where('GioVao','>=','07::00::00')
                                                    ->count('Ngay');
                    $countWork=App\Models\chamcong::where('Ngay','=',$i)
                              ->where('Id_NhanVien','=',$employee->Id_NhanVien)
                              ->count();
                    $getDayOfWork=App\Models\chamcong::where('Id_NhanVien','=',$employee->Id_NhanVien)
                                                ->where('Ngay','=',$i)   
                                                ->get();     
                    if($countWork == null)
                    {
                        ?>
                            <td style="text-align: center" >
                            
                            </td>
                          <?php
                    }
                    else
                    {
                      foreach($getDayOfWork as $sumdate => $work)
                      {
                        $startTime=\Carbon\Carbon::parse($work->GioVao);
                        $endTime= \Carbon\Carbon::parse($work->GioRa);
                        $time =  $startTime->diff($endTime)->format('%H:%I:%S');
                        $fullDate='10:00:00';
                        $halfDate='05:00:00';
                        if($work->GioVao =='00:00:00' && $work->GioRa=='00:00:00')
                        {
                          ?>
                           <td style="text-align: center">  
                              <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                           </td>
                          <?php
                        }
                        else {    
                          if($time >= $fullDate)
                            {
                                ?>
                                <td style="text-align: center">
                                  <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                </td>
                                <?php
                            }
                            else if($time >=$halfDate && $time < $fullDate)
                            {
                                ?>
                                  <td style="text-align: center">
                                    <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                    <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                  </td>
                                <?php
                            }
                            else
                            {
                                ?>
                                <td style="text-align: center">  
                                    <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                </td>
                                <?php
                            }                        
                        }
                      }
                      
                    }
                }
                ?>
                <td>
                 {{$sumDateWork}}
                </td>
            </tr>
            <?php
          }
        ?>
     </tbody>
  </table>