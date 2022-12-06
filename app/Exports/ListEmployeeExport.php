<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\nhanvien;
use DB;

class ListEmployeeExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            // 'Mã nhân viên',
            // 'Họ',
            // 'Tên ',
            // 'Ngày Sinh',
            // 'Giới Tính',
            // 'CMND',
            // 'Dân Tộc',
            // 'Số Điện Thoại',
            // 'Địa Chỉ',
            // 'Nơi Sinh',
            // 'Quê Quán',
            // 'Chuyên Môn',
            // 'Đơn Vị',
            // 'Bộ Môn',
            // 'Đã Vào Đảng',
            // 'Biên Chế',
            // 'Bắt Đầu Công Tác',
            // 'Ngày Vào Trường'
            'Mã nhân viên',
            'Họ',
            'Tên',
            'Chức vụ',
            'Phòng ban',
            'Chuyên môn',
            'Trình độ chuyên môn',
            'Trình độ ngoại ngữ',
            'Trình độ chính trị',
            'Trình độ tin học',
            'Bộ môn',
            'Đơn vị',
            'Ngày sinh',
            'Giới Tính',
            'CMND',
            'Dân Tộc',
            'Số Điện Thoại',
            'Địa Chỉ',
            'Nơi Sinh',
            'Quê Quán',
            'Đã vào đảng',
            'Biên chế',
            'Bắt đâu công tác',
            'Ngày vào trường',
            'Email'
        ];
    }
    // SELECT Id_NhanVien,Ho,Ten,NgaySinh,GioiTinh,CMND,DanToc,SDT,DiaChi,NoiSinh,QueQuan,Id_ChuyenMon,Id_DonVi,Id_BoMon,DaVaoDang,BienChe,BatDauCongTac,NgayVaoTruong FROM nhanvien"
    /**
    * @return \Illuminate\Support\Collection
    */
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $employeeExcel=DB::table('nhanvien')
                            ->select('nhanvien.Id_NhanVien','nhanvien.Ho','nhanvien.Ten','chucvu.TenChucVu','phongban.TenPhongBan'
                            ,'chuyenmon.TenChuyenMon','trinhdochuyenmon.Id_TDChuyenMon','trinhdongoaingu.Id_NgoaiNgu','trinhdochinhtri.Id_ChinhTri','trinhdotinhoc.Id_TinHoc'
                            ,'bomon.TenBoMon','donvi.TenDonVi','nhanvien.NgaySinh','nhanvien.GioiTinh','nhanvien.CMND','nhanvien.DanToc','nhanvien.SDT'
                            ,'nhanvien.DiaChi','nhanvien.NoiSinh','nhanvien.QueQuan','nhanvien.DaVaoDang','nhanvien.BienChe','nhanvien.BatDauCongTac','nhanvien.NgayVaoTruong','nhanvien.Email')
                            ->join('chucvu', 'nhanvien.Id_ChucVu', '=', 'chucvu.Id_ChucVu')
                            ->join('phongban', 'nhanvien.Id_PhongBan', '=', 'phongban.Id_PhongBan')
                            ->join('chuyenmon', 'nhanvien.Id_ChuyenMon', '=', 'chuyenmon.Id_ChuyenMon')
                            ->join('trinhdochuyenmon', 'nhanvien.Id_TDChuyenMon', '=', 'trinhdochuyenmon.Id_TDChuyenMon')
                            ->join('trinhdongoaingu', 'nhanvien.Id_NgoaiNgu', '=', 'trinhdongoaingu.Id_NgoaiNgu')
                            ->join('trinhdochinhtri', 'nhanvien.Id_ChinhTri', '=', 'trinhdochinhtri.Id_ChinhTri')
                            ->join('trinhdotinhoc', 'nhanvien.Id_TinHoc', '=', 'trinhdotinhoc.Id_TinHoc')
                            ->join('bomon', 'nhanvien.Id_BoMon', '=', 'bomon.Id_BoMon')
                            ->join('donvi', 'nhanvien.Id_DonVi', '=', 'donvi.Id_DonVi')
                            ->get();
                          
        return collect($employeeExcel);
    }
}
