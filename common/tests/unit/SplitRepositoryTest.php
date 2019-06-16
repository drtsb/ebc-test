<?php

namespace common\tests\unit;

use Yii;

use common\repositories\SplitRepository;
use common\fixtures\UserFixture;
use common\models\SplitRequestDto;

class SplitRepositoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testCreateNoUser()
    {
        $splitRepository = new SplitRepository();
        
        $this->assertEquals(false, $splitRepository->create(null, new SplitRequestDto(), 1));

    }

    public function testCreateWithUser()
    {
        $splitRepository = new SplitRepository();
        
        $user = $this->tester->grabFixture('user', 'user1');

        $this->assertEquals(true, $splitRepository->create($user, new SplitRequestDto(['n'=>1, 'array'=>[1,1]]), 1));

/*        $split = $this->tester->grabRecord('common\models\Split', [
            'user_id' => 1,
            'result' => 1,
        ]);*/

    }

}