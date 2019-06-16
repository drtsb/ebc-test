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

        // если количество неравных n чисел в массиве = 0
        if ($countNotEqual===0) { return -1; }

        // количество чисел в правой части, неравных n
    	$quantity = $countNotEqual - $notEqual[$countNotEqual-1];

        // если количество неравных n чисел в правой части равно количеству равных n в левой
        // и это количество больше 0, то возвращаем индекс, иначе -1 
        return ( ($quantity === $equal[$countNotEqual-1]) && ($quantity>0) ) ? $countNotEqual : -1;
    }

}