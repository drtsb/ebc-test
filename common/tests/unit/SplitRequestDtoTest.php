<?php

namespace common\tests\unit;

use Yii;
use common\models\SplitRequestDto;

class SplitRequestDtoTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /**
     * @dataProvider dataProvider
     */
    public function testValid($n, $array, $expected)
    {
        $request = new SplitRequestDto([
            'n' => $n,
            'array' => $array,
        ]);
        $this->assertEquals($expected, $request->validate());
    }

    public function dataProvider()
    {
        return [
            [5, [5,5,1,7,2,3,5], true],
            [1, [1,1,'1'], true],
            [1, [1,1,'1.1'], false],
            [1, 0, false],
            ['a', [1,1,1], false],
        ];
    }

}