<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stat_login".
 *
 * @property int $id
 * @property string $login
 * @property int $time
 */
class StatLogin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stat_login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['time'], 'integer'],
            [['login'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'No',
            'login' => 'Login',
            'time' => 'Authorization Time',
        ];
    }
}
