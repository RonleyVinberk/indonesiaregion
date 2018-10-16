<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Villages */
/* @var $form yii\widgets\ActiveForm */

use app\models\Villages;
use app\models\Subdistricts;

// SELECT * FROM `subdistricts` ORDER BY `name`
$Villages = Villages::find()->orderBy(['name' => 'ASC'])->all();
$Subdistricts = Subdistricts::find()->orderBy(['name' => 'ASC'])->all();

$VillagesList = ArrayHelper::map($Villages, 'id', 'name');
$SubdistrictsList = ArrayHelper::map($Subdistricts, 'id', 'name');
?>
<div class="villages-form">
    <!-- start villages-form -->

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?php if($model->subdistrict_id == NULL) { ?>
        <?= $form->field($model, 'subdistrict_id')->label('Subdistrict Name')->widget(Select2::classname(), [
            'data' => $SubdistrictsList,
            'options' => ['placeholder' => 'Choose...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    <?php } else { ?>
        <div class="form-group">
            <!-- start form-group -->

            <label for="subdistrict-name">Subdistrict Name</label>
            <input type="text" value="<?= $model->subdistrict->name ?>" class="form-control" id="subdistrict-name" readonly="readonly" />

            <!-- end form-group -->
        </div>
    <?php } ?>

    <div class="panel panel-info">
        <!-- start panel panel-info -->

        <div class="panel-heading">API Documentation</div>
        <div class="panel-body">
            <!-- start panel-body -->

            <div class="row">
                <!-- start row -->
                
                <div class="col-sm-12 col-md-12">
                    <!-- start col -->

                    <div class="form-group">
                        <!-- start form-group -->

                        <?= $form->field($model, 'id')->label('Village Name')->widget(Select2::classname(),[
                            'data' => $VillagesList,
                            'options' => ['placeholder' => 'Choose...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>

                        <!-- end form-group -->
                    </div>

                    <!-- end col -->
                </div>

                <!-- end row -->
            </div>

            <!-- end panel-body -->
        </div>
        
        <!-- end panel panel-info -->
    </div>

    <div class="form-group">
        <!-- start form-group -->

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel (Back to List)'), ['index'], ['class' => 'btn btn-default']) ?>
        
        <!-- end form-group -->
    </div>

    <?php ActiveForm::end(); ?>

    <!-- end villages-form -->
</div>
<?php
$this->registerJs("
$('#villages-id').change(function(){
    var villages_id = $(this).val();

    
});
", \yii\web\View::POS_READY);