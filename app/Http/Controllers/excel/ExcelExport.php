<?php

namespace App\Http\Controllers\excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ListEmployeeExport;
use App\Exports\SalaryExport;


class ExcelExport extends Controller
{
    public function exportlistemployee()
    {
      return Excel::download(new ListEmployeeExport(),'DanhSachNhanVien.xlsx');
    }
    public function exportsalary()
    {
      return Excel::download(new SalaryExport(),'DSLuongNhanVien.xlsx');
    }
}
