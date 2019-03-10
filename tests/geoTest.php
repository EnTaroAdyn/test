<?php
namespace tests;
require_once $_SERVER['DOCUMENT_ROOT'].'src/geo.php';

use PHPUnit\Framework\TestCase;
use src\geo;

class geoTest extends TestCase
{
    public function testIsNumeric()
    {
        $geoArr = [0 => 1, 1 => 2, 2 => 3];
        $geo = new geo();
        $this->assertIsNumeric($geo->solution($geoArr));
    }

    public function testBigDataTest()
    {
        $geoArr = [];
        for ($i = 0;$i < 100000; $i++){
            $geoArr[] = rand(1,100000000);
        }
        $geo = new geo();
        $this->assertIsNumeric($geo->solution($geoArr));
    }

    public function testDefaultTest()
    {
        $geoArr = [1,3,2,1,2,1,5,3,3,4,2];
        $geo = new geo();
        $this->assertEquals($geo->solution($geoArr),2);
    }

    public function testPeakTest()
    {
        $geoArr = [1,2,3,4,5,4,3,2,1];
        $geo = new geo();
        $this->assertEquals($geo->solution($geoArr),0);
    }

    public function testOther1Test()
    {
        $geoArr = [2,1,6,5,6,3,7,5,8];
        $geo = new geo();
        $this->assertEquals($geo->solution($geoArr),3);
    }

    public function testOther2Test()
    {
        $geoArr = [8,5,7,3,6,5,6,1,2];
        $geo = new geo();
        $this->assertEquals($geo->solution($geoArr),3);
    }

    public function testOther3Test()
    {
        $geoArr = [2,1,4,8,4,8,4,1,2];
        $geo = new geo();
        $this->assertEquals($geo->solution($geoArr),4);
    }

}