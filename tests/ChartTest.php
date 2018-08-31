<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ChartTest extends KernelTestCase
{
    public function testA()
    {
        $this->bootKernel();
        $this->assertEquals(1,1);

        echo get_class(self::$container);

        $chart = self::$container->get('App\Models\Chart');
        echo "qqqqqqqqqqq{$chart->returnAppClass()}yyyyyyyyyyy";
    }
}