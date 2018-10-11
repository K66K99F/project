<?php

namespace app\controllers;

use Yii;
use app\models\Apartment;
use app\models\ApartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Area;
use app\models\MyFunctions;
use app\models\City;
use app\models\Street;
use app\models\HouseType;

/**
 * ApartmentController implements the CRUD actions for Apartment model.
 */
class ApartmentController extends Controller
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
     * Lists all Apartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apartment model.
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
     * Creates a new Apartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apartment();
        $city = new City();
        $area = new Area();
        $street = new Street();
        $house_type = new HouseType();
        $my_functions = new MyFunctions();
        
        $all_cities = $city->getAllCities();
        $array_all_cities = $my_functions->myArray($all_cities, 'id', 'city');
        
        $all_areas = $area->getAllAreas();
        $array_all_areas = $my_functions->myArray($all_areas, 'id', 'area');
        
        $all_streets = $street->getAllStreets();
        $array_all_streets = $my_functions->myArray($all_streets, 'id', 'street');
        
        $all_house_types = $house_type->getAllHouseType();
        $array_all_house_types = $my_functions->myArray($all_house_types, 'id', 'type');
        
        $apartment_stage_complete = [1=>'строящийся', 2=>'каркас', 3=>'с ремонтом'];
        $apartment_payment = [1=>'наличка', 2=>'бартер', 3=>'гражданская ипотека', 4=>'военная ипотека', 5=>'материнский капитал'];
        $apartment_rights_house = [1=>'да', 2=>'нет', 3=>'в процессе'];
        $apartment_layout_type = [1=>'односторонняя', 2=>'разносторонняя', 3=>'сороконожка', 4=>'пентхаус', 5=>'студия'];
        $apartment_status = [1=>'активный', 2=>'продано'];
        $date = date('Y-m-d H:i:s');
        
        $apartment_post_array = Yii::$app->request->post();
        $_apartment_post_array = Yii::$app->request->post('Apartment');
//        print_r($apartment_post_array);echo"<br><ht><br>";
        if(is_array($apartment_post_array) && !empty($apartment_post_array)){
            $_apartment_post_array['date_create'] = $date;
            $_apartment_post_array['date_update'] = null;
            $_apartment_post_array['user_id'] = 1;
            $_apartment_post_array['status'] = 1;
        }
        $apartment_post_array['Apartment'] = $_apartment_post_array;
//        print_r($_apartment_post_array);echo"<br><ht><br>";
//        print_r($apartment_post_array);
//        die();
        
        if ($model->load($apartment_post_array)) {
            if($model->save()){
                Yii::$app->session->setFlash('apartment_save_success', 'Данные успешно сохринились!');
                return $this->redirect(['update', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('apartment_save_failure', 'Данные не удалось сохринить!');
            }
        }else{
//            Yii::$app->session->setFlash('apartment_saveload_failure', 'Данные не удалось получить!');
        }

        return $this->render('create', [
            'model' => $model,
            'array_all_cities' => $array_all_cities,
            'array_all_areas' => $array_all_areas,
            'array_all_streets' => $array_all_streets,
            'array_all_house_types' => $array_all_house_types,
            'apartment_stage_complete' => $apartment_stage_complete,
            'apartment_payment' => $apartment_payment,
            'apartment_rights_house' => $apartment_rights_house,
            'apartment_layout_type' => $apartment_layout_type,
        ]);
    }

    /**
     * Updates an existing Apartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $city = new City();
        $area = new Area();
        $street = new Street();
        $house_type = new HouseType();
        $my_functions = new MyFunctions();
        
        $all_cities = $city->getAllCities();
        $array_all_cities = $my_functions->myArray($all_cities, 'id', 'city');
        
        $all_areas = $area->getAllAreas();
        $array_all_areas = $my_functions->myArray($all_areas, 'id', 'area');
        
        $all_streets = $street->getAllStreets();
        $array_all_streets = $my_functions->myArray($all_streets, 'id', 'street');
        
        $all_house_types = $house_type->getAllHouseType();
        $array_all_house_types = $my_functions->myArray($all_house_types, 'id', 'type');
        
        $apartment_stage_complete = [1=>'строящийся', 2=>'каркас', 3=>'с ремонтом'];
        $apartment_payment = [1=>'наличка', 2=>'бартер', 3=>'гражданская ипотека', 4=>'военная ипотека', 5=>'материнский капитал'];
        $apartment_rights_house = [1=>'да', 2=>'нет', 3=>'в процессе'];
        $apartment_layout_type = [1=>'односторонняя', 2=>'разносторонняя', 3=>'сороконожка', 4=>'пентхаус', 5=>'студия'];
        $apartment_status = [1=>'активный', 2=>'продано'];
        $date = date('Y-m-d H:i:s');
        
        $apartment_post_array = Yii::$app->request->post();
        $_apartment_post_array = Yii::$app->request->post('Apartment');
//        print_r($apartment_post_array);echo"<br><ht><br>";
        if(is_array($apartment_post_array) && !empty($apartment_post_array)){
//            $_apartment_post_array['date_create'] = $date;
            $_apartment_post_array['date_update'] = $date;
            $_apartment_post_array['user_id'] = 1;
            $_apartment_post_array['status'] = 1;
        }
        $apartment_post_array['Apartment'] = $_apartment_post_array;
        
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        if ($model->load($apartment_post_array)) {
            if($model->save()){
                Yii::$app->session->setFlash('apartment_update_success', 'Данные успешно обновились!');
                return $this->redirect(['update', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('apartment_update_failure', 'Данные не удалось обновить!');
            }
        }else{
//            Yii::$app->session->setFlash('apartment_load_failure', 'Данные не удалось получить!');
        }

        return $this->render('update', [
            'model' => $model,
            'array_all_cities' => $array_all_cities,
            'array_all_areas' => $array_all_areas,
            'array_all_streets' => $array_all_streets,
            'array_all_house_types' => $array_all_house_types,
            'apartment_stage_complete' => $apartment_stage_complete,
            'apartment_payment' => $apartment_payment,
            'apartment_rights_house' => $apartment_rights_house,
            'apartment_layout_type' => $apartment_layout_type,
        ]);
    }

    /**
     * Deletes an existing Apartment model.
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
    
    public function actionStreet($id){
        $_id = (string)$id;
        $street = new Street();
        $my_functions = new MyFunctions();
        
        $streets = $street->getStreetByAreaId($_id);
        $array_streets = $my_functions->myArray($streets, 'id', 'street');
        
        if(isset($array_streets)){
            echo "<option>выбрать..</option>";
            foreach($array_streets as $key => $value){
                echo "<option value='".$key."'>".$value."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
//        return Yii::$app->request->post();
    }
    
    /**
     * Finds the Apartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('apartment', 'The requested page does not exist.'));
    }
}
