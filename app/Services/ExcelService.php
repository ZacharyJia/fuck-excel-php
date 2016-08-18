<?php
/**
 * Created by PhpStorm.
 * User: hello
 * Date: 2016/8/14
 * Time: 23:23
 */
namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class ExcelService
{
    public static $Type = ['xlsx', 'xls'];

    public function importExcel($fileName)
    {
        $array = [];
        Excel::load($fileName, function ($reader) use (&$array) {
            //获取表中的数据
            $array = $reader->get()->toArray();
        }, 'UTF-8');
        return $array;
    }

    public function exportExcel($cellData, $excelName, $sheetName, $excelType)
    {
        if (in_array($excelType, ExcelService::$Type)) {
            Excel::create($excelName, function ($excel) use ($cellData, $sheetName) {
                $excel->sheet($sheetName, function ($sheet) use ($cellData) {
                    $sheet->rows($cellData);
                });
            })->export($excelType);
            return true;
        } else {
            return false;
        }
    }

    public function storeExcel($cellData, $excelName, $sheetName, $excelType)
    {
        if (in_array($excelType, ExcelService::$Type)) {
            Excel::create($excelName, function ($excel) use ($cellData, $sheetName) {
                $excel->sheet($sheetName, function ($sheet) use ($cellData) {
                    $sheet->rows($cellData);
                });
            })->store($excelType);
            return true;
        } else {
            return false;
        }
    }
}