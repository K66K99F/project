<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property int $city_id город
 * @property string $area район
 *
 * @property Apartment[] $apartments
 * @property City $city
 * @property Street[] $streets
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'area'], 'required'],
            [['city_id'], 'integer'],
            [['area'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartment', 'ID'),
            'city_id' => Yii::t('apartment', 'город'),
            'area' => Yii::t('apartment', 'район'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreets()
    {
        return $this->hasMany(Street::className(), ['area_id' => 'id']);
    }
    
    /**
     * @return array
     */
    public function getAllAreas()
    {
        $condition = null;
        return Area::find()->where($condition)->all();
    }
    
    /**
     * 
     * @param string $id
     * @return array
     */
    public function getAreaByCityId($id){
        $condition = null;
        return Area::find()->where(['city_id' => $id])->all();
    }
}
