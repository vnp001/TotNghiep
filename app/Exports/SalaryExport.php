<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class SalaryExport implements FromCollection,WithHeadings
{

    public function headings(): array
    {
        return [

            'Ngày bắt đầu chấm lương',
            'Mã nhân viên',
            'Họ',
            'Tên ',
            'Chức vụ',
            'Mã ngạch',
            'Tên Ngạch',
            'Bậc',
            'Lương cơ bản',
            'Hệ số lương',
            'Hệ số phù cấp',
            // 'Lương tăng ca',
            // 'Khen thưởng',
            // 'Kỹ luật',
            'Tổng ngày làm',
            'Tổng tiền'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $salarys=DB::table('luong')
                    ->select(
                            'luong.Ngay','nhanvien.Id_NhanVien','nhanvien.Ho','nhanvien.Ten','chucvu.TenChucVu'
                            ,'ngach.MaNgach','ngach.Ngach','bac.TenBac'
                            ,'bac.LuongCoBan','bac.HeSoLuong','chucvu.HeSoPhuCap'
                            // ,'khenthuong.Thuong','kyluat.Phat'
                            ,'luong.TongNgayLam','luong.TongLuong')
                    ->join('nhanvien', 'luong.Id_NhanVien', '=', 'nhanvien.Id_NhanVien')
                    ->join('bac', 'luong.Id_Bac', '=', 'bac.Id')
                    ->join('ngach', 'bac.Id_Ngach', '=', 'ngach.Id')
                    ->join('chucvu', 'bac.Id_ChucVu', '=', 'chucvu.Id_ChucVu')
                    // ->join('khenthuong', 'khenthuong.Id_NhanVien', '=', 'nhanvien.Id_NhanVien')
                    // ->join('kyluat', 'kyluat.Id_NhanVien', '=', 'nhanvien.Id_NhanVien')
                    ->orderBy('Ngay','ASC')
                    ->get();
        return collect($salarys);
    }
}
