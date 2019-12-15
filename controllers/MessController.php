<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MessForm;
use app\models\MessRecord;

class MessController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
    function getLogin() {

        if (Yii::$app->user->isGuest)
            return $this->redirect('/site/login');
    }

    public function actions() {
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
    /**/


    public function actionIndex() {
        $currSession = Yii::$app->session;
        $this->getLogin();

        $model = new MessForm();
        $messRec = MessRecord::find()
                ->where(['from_id' => $currSession['__id']])
                ->orWhere(['to_id' => $currSession['__id']])
                ->all();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $record = new MessRecord();

                $record->from_id = $currSession['__id'];
                $record->to_id = $model->to_id;
                $record->datetime_mess = date('Y-m-d H:i:s');
                $record->message = $model->mess;
                $record->save();
                return $this->redirect('/mess/index');
            }
        }

        return $this->render('index', ['messform' => $model, 'messRecords' => $messRec]);
    }

    public function actionUpdate() {
        //$form_model = new TestForm();

        $currSession = Yii::$app->session;
        $this->getLogin();

        if (\Yii::$app->request->isAjax) {
            $style_mess='';
            $messRec = MessRecord::find()
                    ->where(['from_id' => $currSession['__id']])
                    ->orWhere(['to_id' => $currSession['__id']])
                    ->all();
            $tmp = '';
            foreach ($messRec as $mess) {
                if ($mess->eqId() == true)
                    $style_mess = 'myright';
                else
                    $style_mess = 'myleft';
                
                $tmp.='<div class="row" style="text-align:right">
                    <div class="row '.$style_mess.' ?>">
                        '. $mess->datetime_mess .' - '.$mess->getUser($mess->from_id) .' 
                    </div>  
                    <div class="row '.$style_mess.'" >'.$mess->message.'</div> 
                    </div>';
                
            }
            return $tmp;
        }
        if ($form_model->load(\Yii::$app->request->post())) {
            var_dump($form_model);
        }
//return $this->render('index', compact('form_model'));
    }

}
