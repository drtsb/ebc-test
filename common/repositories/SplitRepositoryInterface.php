<?php

namespace common\repositories;

use common\models\Split;
use common\models\User;
use common\models\SplitRequestDto;

interface SplitRepositoryInterface
{

    public function create(User $user, SplitRequestDto $request, int $result) : bool;

}