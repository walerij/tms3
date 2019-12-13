<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class UserRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }
    
    public function getUserinfo()
    {
        return $this->hasOne(UserinfoRecord::className(), ['user_id'=>'id']);
    }
    
    public function getBulletins()
    {
        return $this->hasMany(BulletinsRecord::className(), ['user_id'=>'id']);
    }

        public function getCurrUser($id=1)
    {
     $currUser = UserRecord::find()
                     ->where(['id'=>$id])
                     ->one();
     return $currUser;
    }
    
    public function createUser($newUser)
    {
        $this->username = $newUser->username;
        $this->password = md5($newUser->password);
    }
    
}
