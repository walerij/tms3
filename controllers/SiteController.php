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
    
    
    function getLogin()
    {
         
          if (Yii::$app->user->isGuest)
            return $this->redirect ('/site/login');
    }
    
    
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
    
    public function actionMessages()
    {
        $currSession = Yii::$app->session; 
        $this->getLogin();
        
        $model=new MessForm();
        $messRec=MessRecord::find()
                         ->where(['from_id'=>$currSession['__id']])
                         ->orWhere(['to_id'=>$currSession['__id']])
                         ->all();
        if($model->load(Yii::$app->request->post()))
        {
          if($model->validate())
          {
              $record= new MessRecord();
              /*
                'id' => 'ID',
                'from_id' => 'From ID',
                'to_id' => 'To ID',
                'datetime_mess' => 'Datetime Mess',
                'message' => 'Message',
                'status' => 'Status',
              */
              $record->from_id=$currSession['__id'];
              $record->to_id=$model->to_id;
              $record->datetime_mess=date('Y-m-d H:i:s');
              $record->message=$model->mess;
              $record->save();
              return $this->redirect('/site/messages');
          }
            
        }
            
        return $this->render('messenges',['messform'=>$model, 'messRecords'=>$messRec]);
        
    }
    
    
    
    
    
    
    
    
    
    
}
