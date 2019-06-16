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

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

}
