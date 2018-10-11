<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Street */
/* @var $model_city app\models\City */
/* @var $form yii\widgets\ActiveForm */
/* @var $array_all_cities all cities */
?>

<div class="street-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_city, 'city')->dropDownList($array_all_cities, [
        'prompt' => 'выбрать..',
        'onclick' => '$.get("/homes.loc/web/index.php?r=street/areas&id="+$(this).val(), function (data) {$("select#street-area_id").html(data)});',
    ]) ?>
    
    <?= $form->field($model, 'area_id')->dropDownList([], [
        'prompt' => 'выбрать..',
//        'onchange' => '$.post("/street/areas?id="+$("#city-id").val(), function (data) {$("select#street-area_id").html(data)});',
    ]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('apartment', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
