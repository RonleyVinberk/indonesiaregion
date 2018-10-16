<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Villages */

$this->title = 'Create Village';
$this->params['breadcrumbs'][] = ['label' => 'Villages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="villages-create">
    <!-- start villages-create -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <!-- end villages-create -->
</div>