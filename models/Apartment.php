<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartment".
 *
 * @property int $id
 * @property int $city_id город
 * @property int $area_id район
 * @property int $street_id улица
 * @property int $home номер дома
 * @property int $apartment номер квартиры
 * @property int $rooms количество комнат
 * @property int $house_type_id тип дома
 * @property int $quadrature квадратура
 * @property string $storey этаж/этажность
 * @property int $elevator лифт(есть/нет)
 * @property int $price стоимость
 * @property int $stage_complete этап заверщенности
 * @property int $payment форма оплаты
 * @property string $rights_house зеленка
 * @property int $layout_type тип платнировки
 * @property string $comments комментарий
 * @property int $user_id пользователь
 * @property string $date_create дата добавления
 * @property string $date_update дата обновления
 * @property int $status статус
 *
 * @property Area $area
 * @property City $city
 * @property HouseType $houseType
 * @property Street $street
 * @property Favorit[] $favorits
 * @property HomeFoto[] $homeFotos
 */
class Apartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'area_id', 'street_id', 'home', 'apartment', 'rooms', 'house_type_id', 'quadrature', 'storey', 'elevator', 'price', 'stage_complete', 'payment', 'rights_house', 'layout_type', 'user_id', 'date_create', 'date_update', 'status'], 'required'],
            [['city_id', 'area_id', 'street_id', 'home', 'apartment', 'rooms', 'house_type_id', 'quadrature', 'elevator', 'price', 'stage_complete', 'payment', 'layout_type', 'user_id', 'status'], 'integer'],
            [['comments'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['storey'], 'string', 'max' => 100],
            [['rights_house'], 'string', 'max' => 30],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['house_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => HouseType::className(), 'targetAttribute' => ['house_type_id' => 'id']],
            [['street_id'], 'exist', 'skipOnError' => true, 'targetClass' => Street::className(), 'targetAttribute' => ['street_id' => 'id']],
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
            'area_id' => Yii::t('apartment', 'район'),
            'street_id' => Yii::t('apartment', 'улица'),
            'home' => Yii::t('apartment', 'номер дома'),
            'apartment' => Yii::t('apartment', 'номер квартиры'),
            'rooms' => Yii::t('apartment', 'количество комнат'),
            'house_type_id' => Yii::t('apartment', 'тип дома'),
            'quadrature' => Yii::t('apartment', 'квадратура'),
            'storey' => Yii::t('apartment', 'этаж/этажность'),
            'elevator' => Yii::t('apartment', 'лифт(есть/нет)'),
            'price' => Yii::t('apartment', 'стоимость'),
            'stage_complete' => Yii::t('apartment', 'этап заверщенности'),
            'payment' => Yii::t('apartment', 'форма оплаты'),
            'rights_house' => Yii::t('apartment', 'зеленка'),
            'layout_type' => Yii::t('apartment', 'тип платнировки'),
            'comments' => Yii::t('apartment', 'комментарий'),
            'user_id' => Yii::t('apartment', 'пользователь'),
            'date_create' => Yii::t('apartment', 'дата добавления'),
            'date_update' => Yii::t('apartment', 'дата обновления'),
            'status' => Yii::t('apartment', 'статус'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
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
    public function getHouseType()
    {
        return $this->hasOne(HouseType::className(), ['id' => 'house_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorits()
    {
        return $this->hasMany(Favorit::className(), ['apartment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeFotos()
    {
        return $this->hasMany(HomeFoto::className(), ['apartment_id' => 'id']);
    }
}
