<?php

namespace common\components;

use common\models\SplitRequestDto;
 
class ArraySplitter implements ArraySplitterInterface
{

    public function splitArray(SplitRequestDto $request) : int
    {

        $countNotEqual = 0;
        $size = count($request->array);

        for ($i=$size-1; $i >= 0; $i--) { 
            if ($request->n !== $request->array[$i]) { $countNotEqual++; }
            $request->array[$i] = $countNotEqual;
        }

        $index = $request->array[0];

        // количество чисел в левой части, равных n
        $countEqualAtLeftSide = $index - ($request->array[0] - $request->array[$index]);

        // если количество неравных n чисел в правой части равно количеству равных n в левой
        // и это количество не равно 0, то возвращаем индекс, иначе -1 
        return ( ($request->array[$index] === $countEqualAtLeftSide) && ($countEqualAtLeftSide !== 0) ) ? $index : -1;

    }

}