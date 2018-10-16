<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subdistricts */

$this->title = 'Update Subdistrict: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subdistricts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subdistricts-update">
    <!-- start subditricts-update -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end subdistricts-update -->
</div>