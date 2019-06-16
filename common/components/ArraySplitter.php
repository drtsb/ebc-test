<?php

namespace common\components;

use common\models\SplitRequestDto;
 
class ArraySplitter implements ArraySplitterInterface
{

    public function splitArray(SplitRequestDto $request) : int
    {
        return 1;
    }

}