<?php

namespace app\models;

use yii\base\Model;


class QuestionForm extends Model {

  public $name;
  public $email;
  public $question;

  public function rules() {
    return [
      [['name', 'email', 'question'], 'required'],
      [['email'], 'email'],
      [['question'], 'string', 'min' => 5]
    ];
  }

  public function attributeLabels() {
    return [
      'name' => 'Имя пользователя',
      'email' => 'Адрес почты',
      'question' => 'Текст вопроса'
    ];
  }

}