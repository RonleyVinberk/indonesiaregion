<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Districts */
/* @var $form yii\widgets\ActiveForm */

use app\models\Districts;

$Districts = Districts::find()->orderBy(['name' => 'ASC'])->all();
$DistrictsList = ArrayHelper::map($Districts, 'id', 'name');
?>
<div class="districts-form">
    <!-- start districts-form -->

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?php if($model->province_id == NULL) { ?>
        <?= $form->field($model, 'province_id')->label('Province Name')->widget(Select2::classname(), [
            'data' => $DistrictsList,
            'options' => ['placeholder' => 'Choose...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    <?php } else { ?>
        <div class="form-group">
            <!-- start form-group -->

            <label for="province-name">Province Name</label>
            <input type="text" value="<?= $model->province->name ?>" class="form-control" id="province-name" readonly="readonly" />

            <!-- end form-group -->
        </div>
    <?php } ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end districts-form -->
</div>