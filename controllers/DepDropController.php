<?php

namespace app\controllers;

use Yii;
use app\models\DepDrops;
use app\models\DepDropsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Districts;
use app\models\Subdistricts;
use app\models\Villages;

/**
 * DepDropController implements the CRUD actions for DepDrops model.
 */
class DepDropController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DepDrops models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepDropsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DepDrops model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DepDrops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DepDrops();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DepDrops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DepDrops model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DepDrops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DepDrops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DepDrops::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Dependent Dropdown for List District
    public function actionListsDist($id){
        if ($id != '') {
            $countDist = Districts::find()->where(['province_id' => $id])->count();
            $posD = Districts::find()->where(['province_id' => $id])->all();
        } else {
            $countDist = Districts::find()->where(['province_id' => 0])->count();
            $posD = Districts::find()->where(['province_id' => 0])->all();
        }
        
        if($countDist > 0) {
            echo "<option value='0'>Choose...</option>";
            foreach ($posD as $poD) {
                echo "<option value='" .$poD->id. "'>".$poD->name."</option>";
            }
        } else {
            echo "<option value='0'>Choose...</option>";
        }
    }

    // Dependent Dropdown for List Subdistrict
    public function actionListsSubdist($id){
        if ($id != '') {
            $countSubDist = Subdistricts::find()->where(['district_id' => $id])->count();
            $posSd = Subdistricts::find()->where(['district_id' => $id])->all();
        } else {
            $countSubDist = Subdistricts::find()->where(['district_id' => 0])->count();
            $posSd = Subdistricts::find()->where(['district_id' => 0])->all();
        }
        
        if($countSubDist > 0) {
            echo "<option value='0'>Choose...</option>";
            foreach ($posSd as $poSd) {
                echo "<option value='" .$poSd->id. "'>".$poSd->name."</option>";
            }
        } else {
            echo "<option value='0'>Choose...</option>";
        }
    }

    // Dependent Dropdown for List Village
    public function actionListsVill($id){
        if ($id != '') {
            $countVill = Villages::find()->where(['subdistrict_id' => $id])->count();
            $posVl = Villages::find()->where(['subdistrict_id' => $id])->all();
        } else {
            $countVill = Villages::find()->where(['subdistrict_id' => 0])->count();
            $posVl = Villages::find()->where(['subdistrict_id' => 0])->all();
        }
        
        if($countVill > 0) {
            echo "<option value='0'>Choose...</option>";
            foreach ($posVl as $poVl) {
                echo "<option value='" .$poVl->id. "'>".$poVl->name."</option>";
            }
        } else {
            echo "<option value='0'>Choose...</option>";
        }
    }
}