<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $array_all_cities all cities  */


$this->title = Yii::t('apartment', 'Update Area: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('apartment', 'Update');
?>
<div class="area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'array_all_cities' => $array_all_cities,
    ]) ?>

</div>
