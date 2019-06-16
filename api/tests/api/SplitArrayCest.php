<?php

namespace api\tests\api;

use \api\tests\ApiTester;
use common\fixtures\UserFixture;

class SplitArrayCest
{
    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ]);
    }

    public function splitArrayGet(ApiTester $I)
    {
        $I->sendGET('/split/array');
        $I->seeResponseCodeIs(405);
    }

    public function splitArrayUnauthorized(ApiTester $I)
    {
        $I->sendPost('/split/array', [
            'n' => 5,
            'array' => [5,5,1,7,2,3,5],
        ]);
        $I->seeResponseCodeIs(401);
    }

    public function splitArrayAuthorized(ApiTester $I)
    {
        $user = $I->grabFixture('user', 'user1');
        $I->amBearerAuthenticated($user->verification_token);
        $I->sendPost('/split/array', [
            'n' => 5,
            'array' => [5,5,1,7,2,3,5],
        ]);
        $I->seeResponseCodeIs(200);
    }

    public function splitArrayBadRequest(ApiTester $I)
    {
        $user = $I->grabFixture('user', 'user1');
        $I->amBearerAuthenticated($user->verification_token);
        $I->sendPost('/split/array', [
            'n' => 'a',
            'array' => [5,5,1,7,2,3,5],
        ]);
        $I->seeResponseCodeIs(400);
    }

}
