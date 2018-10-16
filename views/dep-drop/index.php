<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepDropsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dependent Dropdown';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dep-drops-index">
    <!-- start dep-drops-index -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => TRUE,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>  <strong>Dependent Dropdowns List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create Dependent Dropdown'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>Yii::t('app', 'Create Dependent Dropdown')])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'label' => 'Province Name',
                'attribute' => 'provinces_id',
                'value' => 'provinces.name'
            ],
            [
                'label' => 'District Name',
                'attribute' => 'districts_id',
                'value' => 'districts.name'
            ],
            [
                'label' => 'Subdistrict Name',
                'attribute' => 'subdistricts_id',
                'value' => 'subdistricts.name'
            ],
            [
                'label' => 'Village Name',
                'attribute' => 'villages_id',
                'value' => 'villages.name'
            ],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- end dep-drops-index -->
</div>