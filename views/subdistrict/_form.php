<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Subdistricts */
/* @var $form yii\widgets\ActiveForm */

use app\models\Districts;

// SELECT * FROM `districts` ORDER BY `name`
$Districts = Districts::find()->orderBy(['name' => 'ASC'])->all();
$DistrictsList = ArrayHelper::map($Districts, 'id', 'name');
?>
<div class="subdistricts-form">
    <!-- start subdistricts-form -->

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if($model->district_id == NULL) { ?>
        <?= $form->field($model, 'district_id')->label('District Name')->widget(Select2::classname(), [
            'data' => $DistrictsList,
            'options' => ['placeholder' => 'Choose...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    <?php } else { ?>
        <div class="form-group">
            <!-- start form-group -->

            <label for="district-name">District Name</label>
            <input type="text" value="<?= $model->district->name ?>" class="form-control" id="district-name" readonly="readonly" />

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

    <!-- end subdistricts-form -->
</div>