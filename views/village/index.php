<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;

use app\models\Subdistricts;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VillagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Villages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="villages-index">
    <!-- start villages-index -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => TRUE,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>  <strong>Villages List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create Village'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>Yii::t('app', 'Create Village')])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'value' => 'name'
            ],
            [
                'label' => 'Subdistrict Name',
                'attribute' => 'subdistrict_id',
                'value' => 'subdistrict.name',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Subdistricts::find()->orderBy(['name' => 'ASC'])->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => [ 'allowClear' => true ],
                ],
                'filterInputOptions' => [ 'placeholder' => '*All*' ],
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- end villages-index -->
</div>