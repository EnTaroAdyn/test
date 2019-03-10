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
}