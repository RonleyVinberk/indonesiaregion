<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DepDrops */
/* @var $form yii\widgets\ActiveForm */

use app\models\Villages;
use app\models\Provinces;
use app\models\Districts;
use app\models\Subdistricts;
?>
<div class="dep-drops-form">
    <!-- start dep-drops-form -->
    
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?= $form->field($model, 'provinces_id')->label('Province Name')->dropDownList(
        ArrayHelper::map(Provinces::find()->all(),'id','name'),
        [
            'prompt' => 'Choose...',
            'onchange'=>'
                $.post("'.Yii::$app->urlManager->createUrl('dep-drop/lists-dist?id=').'"+$(this).val(), function(data){ 
                    $("select#depdrops-districts_id").html(data);
            });'
        ]
    ); ?>
    <?= $form->field($model, 'districts_id')->label('District Name')->dropDownList(
        ArrayHelper::map(Districts::find()->all(),'id','name'),
        [
            'prompt' => 'Choose...',
            'onchange'=>'
                $.post("'.Yii::$app->urlManager->createUrl('dep-drop/lists-subdist?id=').'"+$(this).val(), function(data){ 
                    $("select#depdrops-subdistricts_id").html(data);
            });'
        ]
    ); ?>
    <?= $form->field($model, 'subdistricts_id')->label('Subdistrict Name')->dropDownList(
        ArrayHelper::map(Subdistricts::find()->all(),'id','name'),
        [
            'prompt' => 'Choose...',
            'onchange'=>'
                $.post("'.Yii::$app->urlManager->createUrl('dep-drop/lists-vill?id=').'"+$(this).val(), function(data){ 
                    $("select#depdrops-villages_id").html(data);
            });'
        ]
    ); ?>

    <?php
        if($model->villages_id == NULL) {
    ?>
        <?= $form->field($model, 'villages_id')->label('Village Name')->dropDownList([], ['prompt'=>'Choose...']) ?>
    <?php
        } else {
    ?>
        <div class="form-group">
            <!-- start form-group -->
            
            <label for="villages_id">Village Name</label>
            <input type="text" class="form-control" id="villages_id" value="<?= $model->villages->name; ?>" readonly="readonly" />

            <!-- end form-group -->
        </div>
    <?php
        }
    ?>
    
    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end dep-drops-form -->
</div>