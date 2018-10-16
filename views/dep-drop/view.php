<?php

use yii\helpers\Html;

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DepDrops */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dep Drops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dep-drops-view">
    <!-- start dep-drops-view -->

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <div class="panel panel-info">
        <!-- start panel-panel-info -->
        
        <div class="panel-heading"><span style="text-transform: uppercase;">Indonesia Region Info</span></div>
        <div class="panel-body">
            <!-- start panel-body -->

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Province Name',
                        'attribute' => 'provinces_id',
                        'value' => $model->provinces->name,
                        'labelColOptions' => ['style'=>'width: 50%; text-align: right;']
                    ],
                    [
                        'label' => 'District Name',
                        'attribute' => 'districts_id',
                        'value' => $model->districts->name
                    ],
                    [
                        'label' => 'Subdistrict Name',
                        'attribute' => 'subdistricts_id',
                        'value' => $model->subdistricts->name
                    ],
                    [
                        'label' => 'Village Name',
                        'attribute' => 'villages_id',
                        'value' => $model->villages->name
                    ],
                ],
            ]) ?>

            <!-- end panel-body -->
        </div>

        <!-- end panel-panel-info -->
    </div>
    <div class="panel panel-info">
        <!-- start panel-panel-info -->
        
        <div class="panel-heading"><span style="text-transform: uppercase;">Indonesia Region Info II</span></div>
        <div class="panel-body">
            <!-- start panel-body -->

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'created_by',
                        'value' => isset($user_created_by) ? $user_created_by->full_name : '-',
                        'labelColOptions' => ['style'=>'width: 30%; text-align: right;']
                    ],
                    [
                        'attribute' => 'created_on',
                        'format' => ['date', 'php: d-M-Y H:i:s'],
                        'labelColOptions' => ['style'=>'width: 30%; text-align: right;']
                    ],
                    [
                        'attribute' => 'modified_by',
                        'value' => isset($user_modified_by) ? $user_modified_by->full_name : '-',
                        'labelColOptions' => ['style'=>'width: 30%; text-align: right;']
                    ],
                    [
                        'attribute' => 'modified_on',
                        'format' => ['date', 'php: d-M-Y H:i:s'],
                        'labelColOptions' => ['style'=>'width: 30%; text-align: right;']
                    ]
                ],
            ]) ?>

            <!-- end panel-body -->
        </div>

        <!-- end panel-panel-info -->
    </div>
    
    <!-- end dep-drops-view -->
</div>