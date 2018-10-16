<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Provinces */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="provinces-form">
    <!-- start provinces-form -->

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end provinces-form -->
</div>