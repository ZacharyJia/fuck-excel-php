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
    public function importExcel($fileName){
        Excel::load($fileName,function($reader){
            //获取excel的第1张表
            $reader = $reader->getSheet(0);
            //获取表中的数据
            $results = $reader->toArray();

            return $results;
        });
    }
    public function exportExcel( $cellData,$excelName = 'FuckExcel',$sheetName = 'FuckSheet'){

            Excel::create($excelName,function($excel) use ($cellData,$sheetName){
                $excel->sheet($sheetName, function($sheet) use ($cellData){
                    $sheet->rows($cellData);
                });
            })->export('xls');
        }
}