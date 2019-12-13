<?php

namespace app\models;

use Yii;
use yii\base\Model;


class MessForm extends Model
{
 
      public $mess;
      public $to_id;
    
      public function rules()
      {
        return [
            ['mess', 'string'],
            ['to_id','integer'],
        ];
      
      }
    
    
     public function getSender()
     {
        $currSession = Yii::$app->session; 
        $curr_id =$currSession['__id']; 
        $senders=UserRecord::find()
                 ->where(['not in','id',$curr_id])
                 //->where(['id'=>$tb])
                 ->all();
         
         return $senders;
     }
}