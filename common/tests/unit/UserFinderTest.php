<?php

namespace common\tests\unit;

use Yii;

use common\components\UserFinder;
use common\fixtures\UserFixture;

class UserFinderTest extends \Codeception\Test\Unit
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

    public function testFindExistingUserById()
    {
        $userFinder = new UserFinder();

        $user = $this->tester->grabFixture('user', 'user1');
        
        $this->assertEquals($user, $userFinder->findById(1));

    }

    public function testFindNotExistingUserById()
    {
        $userFinder = new UserFinder();
        
        $this->assertEquals(null, $userFinder->findById(200));

    }

}