<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Street */

$this->title = Yii::t('apartment', 'Create Street');
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Streets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="street-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
