<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ExcelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $import = [
            ['姓名','年龄','性别'],
            ['吴泽凯','19','男'],
            ['时崎狂三','16','女'],
        ];
        $export = [
            ['姓名'=>'吴泽凯','年龄'=>'19','性别'=>'男'],
            ['姓名'=>'时崎狂三','年龄'=>'16','性别'=>'女'],
        ];
        $excel = $this->app->make('excel_ops');
        $excel->storeExcel($import,'FuckExcel','FuckSheet','xlsx');
        $value = $excel->importExcel('storage/exports/FuckExcel.xlsx');
        $this->assertTrue($value == $export);

    }
}
