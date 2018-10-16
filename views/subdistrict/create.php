<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subdistricts */

$this->title = 'Create Subdistrict';
$this->params['breadcrumbs'][] = ['label' => 'Subdistricts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subdistricts-create">
    <!-- start subdistricts-create -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end subdistricts-create -->
</div>