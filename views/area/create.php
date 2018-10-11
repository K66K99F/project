<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var array_all_cities all cities */

$this->title = Yii::t('apartment', 'Create Area');
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'array_all_cities' => $array_all_cities,
    ]) ?>

</div>
