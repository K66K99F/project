<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
/* @var array_all_cities all cities */
/* @var $array_all_areas all areas */
/* @var $array_all_streets all streets */
/* @var $apartment_stage_complete stage complete list */
/* @var $apartment_payment form of payment list */
/* @var $apartment_rights_house green documentlist */
/* @var $apartment_layout_type layout type list */
?>

<div class="apartment-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->hiddenInput()->label(false)?>
    
    <?= $form->field($model, 'city_id')->dropDownList($array_all_cities,[
        'prompt' => 'выбрать..',
        'value' => !empty($model->city_id) ? $model->city_id : 0,
        'onclick' => '$.get("/homes.loc/web/index.php?r=apartment/areas&id="+$(this).val(), function (data) {$("select#apartment-area_id").html(data)});',
    ]) ?>

    <?= $form->field($model, 'area_id')->dropDownList($array_all_areas,[
        'prompt' => 'выбрать..',
        'value' => !empty($model->area_id) ? $model->area_id : 0,
        'onclick' => '$.get("/homes.loc/web/index.php?r=apartment/street&id="+$(this).val(), function (data) {$("select#apartment-street_id").html(data)});',
    ]) ?>

    <?= $form->field($model, 'street_id')->dropDownList($array_all_streets,[
        'prompt' => 'выбрать..',
        'value' => !empty($model->street_id) ? $model->street_id : 0,
    ]) ?>

    <?= $form->field($model, 'home')->textInput() ?>

    <?= $form->field($model, 'apartment')->textInput() ?>

    <?= $form->field($model, 'rooms')->textInput() ?>

    <?= $form->field($model, 'house_type_id')->dropDownList($array_all_house_types, [
        'prompt' => 'выбрать..',
    ]) ?>

    <?= $form->field($model, 'quadrature')->textInput() ?>

    <?= $form->field($model, 'storey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elevator')->checkbox() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'stage_complete')->dropDownList($apartment_stage_complete,[
        'prompt' => 'выбрать..',
    ]) ?>

    <?= $form->field($model, 'payment')->dropDownList($apartment_payment,[
        'prompt' => 'выбрать..',
    ]) ?>

    <?= $form->field($model, 'rights_house')->dropDownList($apartment_rights_house, [
        'prompt' => 'выбрать..',
    ]) ?>

    <?= $form->field($model, 'layout_type')->dropDownList($apartment_layout_type, [
        'prompt' => 'выбрать..',
    ]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => 1])->label(false) ?>

    <?= $form->field($model, 'date_create')->hiddenInput(['value' => null])->label(false) ?>

    <?= $form->field($model, 'date_update')->hiddenInput(['value' => null])->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('apartment', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
