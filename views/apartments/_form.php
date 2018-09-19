<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rooms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_type_id')->textInput() ?>

    <?= $form->field($model, 'quadrature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'storey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elevator')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stage_complete')->textInput() ?>

    <?= $form->field($model, 'payment')->textInput() ?>

    <?= $form->field($model, 'rights_house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layout_type')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('apartments', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
