<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mess".
 *
 * @property int $id
 * @property int|null $from_id
 * @property int|null $to_id
 * @property string|null $datetime_mess
 * @property string|null $message
 * @property string|null $status
 */
class MessRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mess';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id'], 'integer'],
            [['datetime_mess'], 'safe'],
            [['message', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'From ID',
            'to_id' => 'To ID',
            'datetime_mess' => 'Datetime Mess',
            'message' => 'Message',
            'status' => 'Status',
        ];
    }
    
    public function getFrom()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'from_id']);
    }
    
     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'to_id']);
    }
    
    public function getUser($id=1)
    {
        $sender=UserRecord::find()
                 ->where(['id'=>$id])
                 ->one();
        return $sender->username;
    }
    
    public function eqId()
    {
        $currSession = Yii::$app->session; 
        $curr_id =$currSession['__id']; 
        return $this->from_id == $curr_id;
    }
}
