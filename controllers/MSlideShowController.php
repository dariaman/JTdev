<?php

namespace app\controllers;

use Yii;
use app\models\MSlideShow;
use app\models\MSlideShowSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MSlideShowController implements the CRUD actions for MSlideShow model.
 */
class MSlideShowController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all MSlideShow models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MSlideShowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MSlideShow model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $FileNameGbr = pathinfo($model->slideUrl,PATHINFO_FILENAME);
        if (Yii::$app->request->isPost) {
            
            $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $img = Yii::$app->security->generateRandomString(16,$randomString);
            
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model, 'pic');
            $filegbr = pathinfo($model->slideUrl,PATHINFO_FILENAME).'.'.pathinfo($model->slideUrl, PATHINFO_EXTENSION);
            $this->deleteFile($filegbr);
            try{
                $image->saveAs(Yii::$app->params['GambarSlide'] . $img . '.' . $image->extension);
//                echo var_dump(Yii::$app->params['GambarSlide'] . $img . '.' . $image->extension);
//                die();
            }
            catch (ErrorException $ex){
                echo var_dump($ex);
//                die();
            }
            
            $model->slideUrl='images/Slideshow/'. $img . '.' . $image->extension;
            $model->save(FALSE);
            return $this->redirect(['index']);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    protected function findModel($id)
    {
        if (($model = MSlideShow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function deleteFile($filename){
        if(file_exists(Yii::$app->params['GambarSlide'].$filename)){
            unlink(Yii::$app->params['GambarSlide'].$filename);
        }
    }
}
