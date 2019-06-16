<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%split}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $request
 * @property int $result
 */
class Split extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%split}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'request', 'result'], 'required'],
            [['user_id', 'result'], 'integer'],
            [['request'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'request' => 'Request',
            'result' => 'Result',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
