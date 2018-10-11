<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Street */
/* @var $model_city app\models\City */
/* @var $array_all_cities all cities */

$this->title = Yii::t('apartment', 'Update Street: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Streets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('apartment', 'Update');
?>
<div class="street-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_city' => $model_city,
        'array_all_cities' => $array_all_cities,
    ]) ?>

</div>
