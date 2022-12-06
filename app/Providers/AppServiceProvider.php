<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\nhanvien;
use App\Models\yeucau;
use App\Models\khenthuong;
use App\Models\kyluat;
use App\Models\chatbox;
use App\Models\phongban;
use App\Models\thongbao;
use App\Models\noidungchat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $InfoAdmin=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->get;
        // $test=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')])->get;
        // $test=nhanvien::where(['Id_NhanVien'=> session()->has('admin_id')]);
        // view()->share('key', $test);
        // View::share('InfoAdmin', $InfoAdmin);

        // thông tin admin
        view()->composer('*', function ($view) {
            $Admin=nhanvien::where('Id_NhanVien','=',session()->get('admin_id'))
                            ->with('chucvu')->with('phanquyen')
                            ->with('donvi')->with('bomon')
                            ->with('bomon')->with('chuyenmon')
                            ->with('ngoaingu') ->with('tinhoc')
                            ->with('phongban')
                            ->with('chinhtri')->with('trinhdochuyenmon')
                            ->get();
            // $stateadmin='1';
            $notification=thongbao::where('NguoiNhan','=',session()->get('admin_id'))
                                    ->with('nguoigui')
                                    ->orderBy('Id','desc')
                                    ->get();
            
            $laudatory=khenthuong::where('Id_NhanVien','=',session()->get('admin_id'))
                                ->get();
            $discipline=kyluat::where('Id_NhanVien','=',session()->get('admin_id'))
                                ->get();
            

            $view->with(['dataadmin'=>$Admin,'notifyadmin'=>$notification,'stateadmin'=>1,'laudatory'=>$laudatory,'discipline'=>$discipline]);
        });
        
        view()->composer('*', function ($view) {
            $user=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))
                             ->with('chucvu')->with('phanquyen')
                            ->with('donvi')->with('bomon')
                            ->with('bomon')->with('chuyenmon')
                            ->with('ngoaingu') ->with('tinhoc')
                            ->with('phongban')
                            ->with('chinhtri')->with('trinhdochuyenmon')
                            ->get();
            // $text=yeucau::with('nhanvien')->get();
            $getDerparment=nhanvien::where('Id_NhanVien','=',session()->get('user_id'))->get();
            $notification='';
            foreach($getDerparment as $derparment)
            {
              $notification =thongbao::where('NguoiNhan','=',session()->get('user_id'))
                                    ->orWhere('PhongBan','=',$derparment->Id_PhongBan)
                                    ->with('nguoigui')
                                    ->orderBy('Id','desc')
                                    ->get();   
            }
           
            $view->with(['datauser'=>$user,'notifyuser'=>$notification]);
        });
    }
}
