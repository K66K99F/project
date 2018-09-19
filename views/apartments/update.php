<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartments */

$this->title = Yii::t('apartments', 'Update Apartments: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartments', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('apartments', 'Update');
?>
<div class="apartments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
