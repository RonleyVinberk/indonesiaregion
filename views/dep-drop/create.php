<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DepDrops */

$this->title = 'Create Dependent Dropdown';
$this->params['breadcrumbs'][] = ['label' => 'Dependent Dropdown', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dep-drops-create">
    <!-- start dep-drops-create -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end dep-drops-create -->
</div>