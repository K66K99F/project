<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'area_id') ?>

    <?= $form->field($model, 'street_id') ?>

    <?= $form->field($model, 'home') ?>

    <?php // echo $form->field($model, 'apartment') ?>

    <?php // echo $form->field($model, 'rooms') ?>

    <?php // echo $form->field($model, 'house_type_id') ?>

    <?php // echo $form->field($model, 'quadrature') ?>

    <?php // echo $form->field($model, 'storey') ?>

    <?php // echo $form->field($model, 'elevator') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'stage_complete') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'rights_house') ?>

    <?php // echo $form->field($model, 'layout_type') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('apartment', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('apartment', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
