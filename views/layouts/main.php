<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\bootstrap\ActiveForm;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'terra-my-su',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    
    ActiveForm::begin([
               'action'=>['site/search'],
               'method'=>'get',
               'options'=>
               [
                   'class'=>'navbar-form navbar-left'
               ]
               
           ]);
           
           echo '<div class="input-group input-group-sm">';
         
           echo Html::input($type='text',
                       'search',
                       '',
                   [
                       'placeholder'=>'Найти...',
                       'class'=>'form-control',
                       'size'=>'20'
                   ]
                   
                   );
            
           
           echo '</div>';
           ActiveForm::end();
           
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right','id' => 'mytopmenu'],
        'items' => [
            ['label' => 'Сообщения', 'url' => ['/mess/index'],  'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Фото',      'url' => ['/photo/index'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Музыка',    'url' => ['/music/index'], 'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Видео',     'url' => ['/video/index'], 'visible'=>!Yii::$app->user->isGuest],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Валерон-корпорейтед <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
