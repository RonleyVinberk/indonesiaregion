<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DepDrops */

$this->title = 'Update Dependent Dropdown: ' . $model->provinces->name;
$this->params['breadcrumbs'][] = ['label' => 'Dependent Dropdown', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dep-drops-update">
    <!-- start dep-drops-update -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end dep-drops-update -->
</div>