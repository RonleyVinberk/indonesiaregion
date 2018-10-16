<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepDropsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="dep-drops-search">
    <!-- start dep-drops-search -->

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'villages_id') ?>

    <?= $form->field($model, 'subdistricts_id') ?>

    <?= $form->field($model, 'districts_id') ?>

    <?= $form->field($model, 'provinces_id') ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end dep-drops-search -->
</div>