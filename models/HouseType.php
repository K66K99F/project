<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "house_type".
 *
 * @property int $id
 * @property string $type тип дома
 *
 * @property Apartment[] $apartments
 */
class HouseType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'house_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'type' => Yii::t('apartment', 'тип дома'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['house_type_id' => 'id']);
    }
    
    public function getAllHouseType(){
        $condition = null;
        return HouseType::find()->where($condition)->all();
    }
}
