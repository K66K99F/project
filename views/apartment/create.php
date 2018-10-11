<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $array_all_cities all cities */
/* @var $array_all_areas all areas */
/* @var $array_all_streets all streets */
/* @var $array_all_house_types all house types */
/* @var $apartment_stage_complete stage complete list */
/* @var $apartment_payment form of payment list */
/* @var $apartment_rights_house green documentlist */
/* @var $apartment_layout_type layout type list */

$this->title = Yii::t('apartment', 'Добавление квартиры');
$this->params['breadcrumbs'][] = ['label' => Yii::t('apartment', 'Квартиры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'array_all_cities' => $array_all_cities,
        'array_all_areas' => $array_all_areas,
        'array_all_streets' => $array_all_streets,
        'array_all_house_types' => $array_all_house_types,
        'apartment_stage_complete' => $apartment_stage_complete,
        'apartment_payment' => $apartment_payment,
        'apartment_rights_house' => $apartment_rights_house,
        'apartment_layout_type' => $apartment_layout_type,
    ]) ?>

</div>
