<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;

use app\models\Districts;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SubdistrictsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subdistricts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subdistricts-index">
    <!-- start subdistricts-index -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => TRUE,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>  <strong>Subdistricts List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create Subdistrict'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>Yii::t('app', 'Create Subdistrict')])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'name'
            ],
            [
                'label' => 'District Name',
                'attribute' => 'district_id',
                'value' => 'district.name',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Districts::find()->orderBy(['name' => 'ASC'])->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '*All*'],
            ],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- end subdistrict-index -->
</div>