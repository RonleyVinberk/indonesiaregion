<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;

use app\models\Provinces;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DistrictsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Districts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="districts-index">
    <!-- start district-index -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => TRUE,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>  <strong>Districts List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create District'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>Yii::t('app', 'Create District')])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'name',
            [
                'label' => 'Province Name',
                'attribute' => 'province_id',
                'value' => 'province.name',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Provinces::find()->orderBy(['name' => 'ASC'])->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '*All*'],
            ],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- end district-index -->
</div>