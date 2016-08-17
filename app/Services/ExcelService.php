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
    public static function importExcel($fileName){
        $array= [];
        Excel::load($fileName,function($reader) use (&$array){
            //获取excel的第1张表
            $sheet = $reader->getSheet(0);
            //获取表中的数据
            $array = $sheet->toArray();
        },'UTF-8');
        return $array;
    }
    public static function exportExcel( $cellData,$excelName = 'FuckExcel',$sheetName = 'FuckSheet'){

            Excel::create($excelName,function($excel) use ($cellData,$sheetName){
                $excel->sheet($sheetName, function($sheet) use ($cellData){
                    $sheet->rows($cellData);
                });
            })->export('xls');
        }
    public static function storeExcel( $cellData,$excelName = 'FuckExcel',$sheetName = 'FuckSheet'){

        Excel::create($excelName,function($excel) use ($cellData,$sheetName){
            $excel->sheet($sheetName, function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->store('xls');
    }
}