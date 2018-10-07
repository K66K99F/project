<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property int $user_id пользователь
 * @property string $role_name название роли
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'role_name'], 'required'],
            [['user_id'], 'integer'],
            [['role_name'], 'string', 'max' => 120],
        ];
    }
    
    /**
     * 
     * @param integer $user_id
     * @return array
     */
    public static function findByUserid($user_id){
        return static::findOne(['user_id' => $user_id]);
    }

    /**
     * 
     * @param integer $user_id
     * @return string
     */
    public function getUserRole($user_id){
        $role_name = null;
        if(!empty($user_id)){
            $role = static::findByUserid($user_id);
            $role_name = $role['role_name'];
        }
        return $role_name;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartments', 'ID'),
            'user_id' => Yii::t('apartments', 'пользователь'),
            'role_name' => Yii::t('apartments', 'название роли'),
        ];
    }
}
