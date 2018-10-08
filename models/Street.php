<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "street".
 *
 * @property int $id
 * @property int $area_id район
 * @property string $street улица
 *
 * @property Apartment[] $apartments
 * @property Area $area
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'street';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'street'], 'required'],
            [['area_id'], 'integer'],
            [['street'], 'string', 'max' => 255],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'area_id' => Yii::t('apartment', 'район'),
            'street' => Yii::t('apartment', 'улица'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['street_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }
}
