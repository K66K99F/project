<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ApartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('apartment', 'Список квартир');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('apartment', 'Добавить квартиру'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => '№',
            ],

//            'id',
//            'city_id',
//            [
//                'attribute'=>'ciry_id',
//                'label'=>'Родительская категория',
//                'format'=>'text', // Возможные варианты: raw, html
//                'content'=>function($data){
//                    return $data->getParentName();
//                },
//                'filter' => app\models\Apartment::getCity()
//            ],
            'area_id',
            'street_id',
            'home',
            'apartment',
            'rooms',
            'house_type_id',
            'quadrature',
            'storey',
            'elevator',
            'price',
            'stage_complete',
            'payment',
            'rights_house',
            'layout_type',
            'comments:ntext',
            'user_id',
//            'date_create',
//            'date_update',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
