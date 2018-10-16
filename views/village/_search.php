<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VillagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="villages-search">
    <!-- start villages-search -->

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subdistrict_id') ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end villages-search -->
</div>