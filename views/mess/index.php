<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Переписка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" id='messView'>
    <?php
    $style_mess = '';

    foreach ($messRecords as $mess) {
        if ($mess->eqId() == true)
            echo $this->context->renderPartial('messl',['mess'=>$mess]);
        else
            echo $this->context->renderPartial('messr',['mess'=>$mess]);
    }
    ?>
   

</div>
<div class="row">
   
</div>
<div class="row">
    <?php $form = ActiveForm::begin(['id' => 'addmess-form']); ?> 
    <?php
    $parent_user = $messform->getSender();
    $items = \yii\helpers\ArrayHelper::map($parent_user, 'id', 'username');
    $params = ['prompt' => 'Выберите пользователя...'];
    ?>
    <?= $form->field($messform, 'to_id')->dropDownList($items)->label('Кому:') ?> 
    <?= $form->field($messform, 'mess')->textArea(['autofocus' => 'true'])->label("Сообщения") ?>
    <button type="submit" class="btn btn-primary">
        Отправить
    </button>


    <?php ActiveForm::end(); ?>
</div>
