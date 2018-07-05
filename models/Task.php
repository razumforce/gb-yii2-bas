<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property int $date
 * @property string $description
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{
    public $events = [];

    public function behaviors()
    {

        return [
            'timestamp1' => [
                'class' => TimestampBehavior::className(),
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'user_id'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => 'Название',
            'date' => 'Дата',
            'description' => 'Описание',
            'user_id' => 'Пользователь',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function getDaysAndEvents($id = null)
    {
        $daysInMonth = date('t');

        for ($i = 0; $i < $daysInMonth; $i++)
        {
            $time = mktime(0, 0, 0, date('n'), $i, date('Y'));
            $this->events[$i] = self::findAll(['date' => $time]);
        }

        return $this->events;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        $array = explode('.', $this->date);
        $this->date = mktime(0, 0, 0, $array[1], $array[0], $array[2]);
        return parent::beforeSave($insert);
    }
}
