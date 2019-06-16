<?php

namespace common\components;

use common\models\SplitRequestDto;
 
class ArraySplitter implements ArraySplitterInterface
{

    public function splitArray(SplitRequestDto $request) : int
    {
    	$countEqual = $countNotEqual = 0;
    	$equal = $notEqual = [];
    	$size = count($request->array);

    	for ($i=0; $i < $size; $i++) { 
        	if ($request->n === $request->array[$i]) { $countEqual++; }
        	else { $countNotEqual++; }
        	$equal[$i] = $countEqual;
        	$notEqual[$i] = $countNotEqual;
    	}

    	$quantity = $countNotEqual - $notEqual[$countNotEqual-1];

        return ( ($quantity === $equal[$countNotEqual-1]) && ($quantity>0) )
        	? $countNotEqual : -1;
    }

}