<?php
namespace common\models;

use Yii;
use yii\base\Model;

class SplitRequestDto extends Model
{
    public $n;
    public $array;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['n', 'array'], 'required'],
            [['n'], 'integer'],
            [['array'], 'each', 'rule' => ['integer']],
        ];
    }

}
