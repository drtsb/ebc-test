<?php

namespace common\components;

use common\models\SplitRequestDto;
 
interface ArraySplitterInterface
{
    public function splitArray(SplitRequestDto $request) : int;
}