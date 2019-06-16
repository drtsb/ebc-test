<?php

namespace common\repositories;

use Yii;
use common\models\Split;
use common\models\User;
use common\models\SplitRequestDto;

class SplitRepository implements SplitRepositoryInterface
{

    public function create(?User $user, SplitRequestDto $request, int $result) : bool
    {
    	if ($user === null) { return false; }

    	$split = Yii::createObject([
    		'class' => Split::class,
    		'user_id' => $user->id,
    		'request' => json_encode($request),
    		'result' => $result,
    	]);

        return $split->save();
    }

}