<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProvincesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="provinces-search">
    <!-- start provinces-search -->

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'created_on') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'modified_on') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end provinces-search -->
</div>