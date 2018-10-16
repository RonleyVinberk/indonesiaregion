<?php

namespace app\controllers\api;

use Yii;
use yii\rest\ActiveController;

/**
 * URL untuk panggil API
 * Hanya data Sales Order saja
 * - url: http://localhost/montaz-erp/web/sales/api/order/view?id=3
 * Expand relasi orderDetails
 * - url: http://localhost/montaz-erp/web/sales/api/order/view?id=3&expand=orderDetails
 * Expand relasi item yang ada di dalam orderDetails
 * - url: http://localhost/montaz-erp/web/sales/api/order/view?id=3&expand=orderDetails,orderDetails.item
 */
class VillageController extends ActiveController
{
    public $modelClass = 'app\models\Villages';

    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}