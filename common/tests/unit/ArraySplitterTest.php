<?php

namespace common\tests\unit;

use Yii;
use common\components\ArraySplitter;
use common\models\SplitRequestDto;

class ArraySplitterTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /**
     * @dataProvider requestProvider
     */
    public function testSplit($n, $array, $expected)
    {
        $splitter = new ArraySplitter();
        $request = new SplitRequestDto([
            'n' => $n,
            'array' => $array,
        ]);
        $this->assertEquals($expected, $splitter->splitArray($request));
    }

    public function requestProvider()
    {
        return [
            [5, [5,5,1,7,2,3,5], 4],
            [2, [2,1,1,1,2], 3],
            [2, [2,2,2,2], -1],
            //[1, 1, 3]
        ];
    }

}