<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Apartments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartments', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('apartments', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('apartments', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('apartments', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city_id',
            'area_id',
            'street',
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
            'date_create',
            'date_update',
            'comments',
        ],
    ]) ?>

</div>
