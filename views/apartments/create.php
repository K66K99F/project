<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Apartments */

$this->title = Yii::t('apartments', 'Create Apartments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartments', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
