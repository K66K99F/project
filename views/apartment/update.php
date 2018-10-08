<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */

$this->title = Yii::t('apartment', 'Изменение квартиры: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Квартиры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('apartment', 'Изменить');
?>
<div class="apartment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
