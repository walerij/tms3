<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Переписка';
$this->params['breadcrumbs'][] = $this->title;
?>
   

   
<div class="row">
    <?php 
    $style_mess='';
    
    foreach($messRecords as $mess) { 
    if($mess->eqId()==true)
        $style_mess='myright';
    else    
        $style_mess='myleft';
    
     ?>
        <div class="row" style="text-align:right">
          <div class="row <?=$style_mess?>">
              <?=$mess->datetime_mess ?> - 
              <?=$mess->getUser($mess->from_id)?> 
          </div>  
         <div class="row <?=$style_mess?>" >
              <?=$mess->message ?>
             
          </div> 
        </div>
    <?php }?>
</div>
<div class="row">
  
</div>
<div class="row">
         <?php $form = ActiveForm::begin(['id' => 'adduser-form']); ?> 
               <?php
        $parent_user = $messform->getSender();
        $items = \yii\helpers\ArrayHelper::map($parent_user, 'id', 'username');
        $params = ['prompt' => 'Выберите пользователя...'];
        ?>
        <?= $form->field($messform, 'to_id')->dropDownList($items)->label('Кому:')      ?> 
               <?= $form->field($messform, 'mess')->textArea(['autofocus' => 'true'])->label("Сообщения") ?>
               <button type="submit" class="btn btn-primary">
                   Отправить
                </button>
        <?php ActiveForm::end(); ?>
</div>
