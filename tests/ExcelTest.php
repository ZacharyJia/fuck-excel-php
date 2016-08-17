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
        $arr = [
            ['吴泽凯','B','C'],
            ['D','E','F'],
            ['G','H','I'],
        ];
        $excel = $this->app->make('excel_ops');
        $excel->storeExcel($arr);
        $value = $excel->importExcel('storage\exports\FuckExcel.xls');
        $this->assertTrue($arr == $value);

    }
}
