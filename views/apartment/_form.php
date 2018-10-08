<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'street_id')->textInput() ?>

    <?= $form->field($model, 'home')->textInput() ?>

    <?= $form->field($model, 'apartment')->textInput() ?>

    <?= $form->field($model, 'rooms')->textInput() ?>

    <?= $form->field($model, 'house_type_id')->textInput() ?>

    <?= $form->field($model, 'quadrature')->textInput() ?>

    <?= $form->field($model, 'storey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elevator')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'stage_complete')->textInput() ?>

    <?= $form->field($model, 'payment')->textInput() ?>

    <?= $form->field($model, 'rights_house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layout_type')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <!--<?//= $form->field($model, 'user_id')->textInput() ?>-->

    <!--<?//= $form->field($model, 'date_create')->textInput() ?>-->

    <!--<?//= $form->field($model, 'date_update')->textInput() ?>-->

    <!--<?//= $form->field($model, 'status')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('apartment', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
