<?php

namespace app\controllers;

use Yii;
use app\models\DealerLimits;
use app\models\DealerLimitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Access;
use yii\filters\AccessControl;

/**
 * DealerLimitsController implements the CRUD actions for DealerLimits model.
 */
class DealerLimitsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        Yii::$app->language = 'ru';
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                        [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DealerLimits models.
     * @return mixed
     */
    public function actionIndex()
    {
        $accses_model = new Access();
        $accses_info = $accses_model->GetAccsessToPage(Yii::$app->user->identity->login, "1");
        if (isset($accses_info[0]) && ($accses_info[0]["access_level"] == "C" || $accses_info[0]["access_level"] == "R")) {
            
            $searchModel = new DealerLimitsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            
        } else {
            return Yii::$app->response->redirect(['site/index']);
        }
    }

    /**
     * Displays a single DealerLimits model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DealerLimits model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DealerLimits();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->dealer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DealerLimits model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $accses_model = new Access();
        $accses_info = $accses_model->GetAccsessToPage(Yii::$app->user->identity->login, "1");
        if (isset($accses_info[0]) && ($accses_info[0]["access_level"] == "C")) {
            
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    Yii::$app->session->setFlash('success', Yii::t('dealer-limits', 'Изменения успешно внесены'));
                    return $this->redirect(['update', 'id' => $model->dealer_id]);
                }else{
                    Yii::$app->session->setFlash('error', Yii::t('dealer-limits', 'Не удалось внести изменения'));
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return Yii::$app->response->redirect(['site/index']);
        }
    }

    /**
     * Deletes an existing DealerLimits model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DealerLimits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DealerLimits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DealerLimits::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
