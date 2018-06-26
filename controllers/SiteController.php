<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use yii\db\Query;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionDao() {
        $queryRows = (new Query())
            ->select(['CONCAT(id, " - ", fio) AS full_data', 'login AS login_user', 'password'])
            ->from('user')
            // ->where('id = :myId OR login = :myLogin', [':myId' => 2, ':myLogin' => 'xxx127'])
            // ->limit(2)
            ->all();

        $queryRowsCount = (new Query())
            ->select('COUNT(*) AS count')
            ->from('user')
            ->all();

        return $this->render('dao', [
            'queryRows' => $queryRows,
            'queryRowsCount' => $queryRowsCount
        ]);
    }


    public function actionSql() {
        $sql = 'SELECT * FROM user';
        $sqlCount = 'SELECT COUNT(*) FROM user';
        $sqlWithParams = 'SELECT * FROM user WHERE id = :myId';

        // $queryRows = Yii::$app->db->createCommand($sql)->queryAll();
        // $queryRows = Yii::$app->db->createCommand($sql)->queryOne();

        // $queryRows = Yii::$app->db->createCommand($sqlCount)->queryScalar();

        $queryRows = Yii::$app->db->createCommand($sqlWithParams)
            ->bindValue(':myId', 2)
            ->queryAll();

        return $this->render('sql', [
            'queryRows' => $queryRows
        ]);
    }


    public function actionAdduser() {
        Yii::$app->db->createCommand()->insert('user', [
            'login' => 'myinsert',
            'password' => '1234',
            'email' => 'test@test.tt',
            'fio' => 'My Insert',
            'description' => 'sdfsdfa asdf asfsdf'
        ])->execute();
    }
}
