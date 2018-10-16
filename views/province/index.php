<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvincesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provinces-index">
    <!-- start provinces-index -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => TRUE,
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-th-list"></i>  <strong>Provinces List</strong>',
        ],
        'toolbar' =>  [ 
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;'.Yii::t('app', 'Create Province'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>Yii::t('app', 'Create Province')])
            ],
            '{export}', 
            '{toggleData}' 
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'name',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- end provinces-index -->
</div>