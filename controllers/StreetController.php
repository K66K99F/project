<?php

namespace app\controllers;

use Yii;
use app\models\Street;
use app\models\StreetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\City;
use app\models\Area;
use app\models\MyFunctions;

/**
 * StreetController implements the CRUD actions for Street model.
 */
class StreetController extends Controller
{
    
//    public $enableCsrfValidation = false;
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
     * Lists all Street models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StreetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Street model.
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
     * Creates a new Street model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Street();
        $model_city = new City();
        $my_functions = new MyFunctions();
        
        $all_cities = $model_city->getAllCities();
        $array_all_cities = $my_functions->myArray($all_cities, 'id', 'city');
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'model_city' => $model_city,
            'array_all_cities' => $array_all_cities,
        ]);
    }

    /**
     * Updates an existing Street model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_city = new City(); 
        $my_functions = new MyFunctions();
        
        $all_cities = $model_city->getAllCities();
        $array_all_cities = $my_functions->myArray($all_cities, 'id', 'city');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'model_city' => $model_city,
            'array_all_cities' => $array_all_cities,
        ]);
    }

    /**
     * Deletes an existing Street model.
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
    
    public function actionCities(){
//        return Yii::$app->request->post();
    }
    
    public function actionAreas($id){
        $_id = (string)$id;
        $area = new Area();
        $my_functions = new MyFunctions();
        
        $areas = $area->getAreaByCityId($_id);
        $array_areas = $my_functions->myArray($areas, 'id', 'area');
        
        if(isset($array_areas)){
            echo "<option>выбрать..</option>";
            foreach($array_areas as $key=>$value){
                echo "<option value='".$key."'>".$value."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
//        return Yii::$app->request->post();
    }

    /**
     * Finds the Street model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Street the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Street::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('apartment', 'The requested page does not exist.'));
    }
}
