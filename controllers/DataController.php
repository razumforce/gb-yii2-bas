<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

class DataController extends Controller
{
  public function actionCache()
  {
    $cache1 = Yii::$app->cache;
    $myTime = $cache1->get('mytime');

    if($myTime === false)
    {
      $myTime = time();
      $cache1->set('mytime', $myTime, 15);
    }

    return $this->render('cache', [
      'myTime' => $myTime
    ]);
  }

  public function actionCache2()
  {
    $cache = Yii::$app->cache;

    // $cache->delete('mytime2');

    // $cache->flush();

    $myTime = $cache->getOrSet('mytime2', function() {
      return time();
    }, 10);

    $isKey1 = $cache->exists('mytime2');
    $isKey2 = $cache->exists('mytime5');

    return $this->render('cache2', [
      'myTime' => $myTime,
      'isKey1' => $isKey1,
      'isKey2' => $isKey2,
    ]);
  }

  public function actionCache3()
  {
    $cache = Yii::$app->cache;
    $userId = 10;

    $myTime = $cache->getOrSet('mytimeuser', function() use ($userId) {
      return time() . ' - ' . $userId;
    });

    return $this->render('cache3', [
      'myTime' => $myTime
    ]);
  }

  public function actionCache4()
  {
    $cache = Yii::$app->cache2;
    $userId = 10;

    $myTime = $cache->getOrSet('mytimeuser2', function() use ($userId) {
      return time() . ' - ' . $userId;
    }, 10);

    return $this->render('cache4', [
      'myTime' => $myTime
    ]);
  }

}

?>
