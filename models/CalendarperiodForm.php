<?php

namespace app\models;

use yii\base\Model;


class CalendarperiodForm extends Model {

  public $month;
  public $year;

  public function rules() {
    return [
      [['month', 'year'], 'required']
    ];
  }

  public function attributeLabels() {
    return [
      'month' => 'Месяц',
      'year' => 'Год'
    ];
  }

}