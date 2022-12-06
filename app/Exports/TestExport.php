<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\models\nhanvien;
use DB;
class TestExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'Mã nhân viên',
            'Họ',
            'Tên ',
            'Ngày Sinh',
            'Giới Tính',
            'CMND',
            'Dân Tộc',
            'Số Điện Thoại',
            'Địa Chỉ',
            'Nơi Sinh',
            'Quê Quán',
            'Chuyên Môn',
            'Đơn Vị',
            'Bộ Môn',
            'Đã Vào Đảng',
            'Biên Chế',
            'Bắt Đầu Công Tác',
            'Ngày Vào Trường'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        $employeeExcel=DB::select("SELECT Id_NhanVien,Ho,Ten,NgaySinh,GioiTinh,CMND,DanToc,SDT,DiaChi,NoiSinh,QueQuan,Id_ChuyenMon,Id_DonVi,Id_BoMon,DaVaoDang,BienChe,BatDauCongTac,NgayVaoTruong FROM nhanvien");
        return collect($employeeExcel);
    }
}
