<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorit".
 *
 * @property int $id
 * @property int $user_id пользователь
 * @property int $apartment_id квартира
 *
 * @property Apartment $apartment
 * @property User $user
 */
class Favorit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'apartment_id'], 'required'],
            [['user_id', 'apartment_id'], 'integer'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'user_id' => Yii::t('apartment', 'пользователь'),
            'apartment_id' => Yii::t('apartment', 'квартира'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
