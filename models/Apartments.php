<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartments".
 *
 * @property int $id id
 * @property int $city_id город
 * @property int $area_id район
 * @property string $street улица
 * @property string $home номер дома
 * @property string $apartment номер квартиры
 * @property string $rooms количество комнат
 * @property int $house_type_id тип дома
 * @property string $quadrature квадратура
 * @property string $storey этаж/этажность
 * @property int $elevator лифт(есть/нет)
 * @property string $price стоимость
 * @property int $stage_complete этап заверщенности
 * @property int $payment форма оплаты
 * @property string $rights_house зеленка
 * @property int $layout_type тип платнировки
 * @property string $date_create дата добавления
 * @property string $date_update дата обновления
 * @property string $comments комментарий
 */
class Apartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'area_id', 'street', 'home', 'apartment', 'rooms', 'house_type_id', 'quadrature', 'storey', 'elevator', 'price', 'stage_complete', 'payment', 'rights_house', 'layout_type', 'date_create', 'date_update'], 'required'],
            [['city_id', 'area_id', 'home', 'apartment', 'rooms', 'house_type_id', 'quadrature', 'elevator', 'price', 'stage_complete', 'payment', 'layout_type'], 'integer'],
            [['rights_house'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['street'], 'string', 'max' => 150],
            [['storey'], 'string', 'max' => 100],
            [['comments'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('apartments', 'id'),
            'city_id' => Yii::t('apartments', 'город'),
            'area_id' => Yii::t('apartments', 'район'),
            'street' => Yii::t('apartments', 'улица'),
            'home' => Yii::t('apartments', 'номер дома'),
            'apartment' => Yii::t('apartments', 'номер квартиры'),
            'rooms' => Yii::t('apartments', 'количество комнат'),
            'house_type_id' => Yii::t('apartments', 'тип дома'),
            'quadrature' => Yii::t('apartments', 'квадратура'),
            'storey' => Yii::t('apartments', 'этаж/этажность'),
            'elevator' => Yii::t('apartments', 'лифт(есть/нет)'),
            'price' => Yii::t('apartments', 'стоимость'),
            'stage_complete' => Yii::t('apartments', 'этап заверщенности'),
            'payment' => Yii::t('apartments', 'форма оплаты'),
            'rights_house' => Yii::t('apartments', 'зеленка'),
            'layout_type' => Yii::t('apartments', 'тип платнировки'),
            'date_create' => Yii::t('apartments', 'дата добавления'),
            'date_update' => Yii::t('apartments', 'дата обновления'),
            'comments' => Yii::t('apartments', 'комментарий'),
        ];
    }
}
