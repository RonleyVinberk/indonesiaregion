<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Villages */

$this->title = 'Update Village: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Villages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="villages-update">
    <!-- start villages-update -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end villages-update -->
</div>