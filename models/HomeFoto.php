<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "home_foto".
 *
 * @property int $id
 * @property int $apartment_id квартира
 * @property string $foto_url путь к фото
 *
 * @property Apartment $apartment
 */
class HomeFoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartment_id', 'foto_url'], 'required'],
            [['apartment_id'], 'integer'],
            [['foto_url'], 'string'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'apartment_id' => Yii::t('apartment', 'квартира'),
            'foto_url' => Yii::t('apartment', 'путь к фото'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }
}
