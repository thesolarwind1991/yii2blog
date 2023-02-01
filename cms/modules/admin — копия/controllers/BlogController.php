<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Blog;
use app\modules\admin\models\BlogForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Blog models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('views', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'views' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blog();
        $modelForm = new BlogForm();

        if ($this->request->isPost) {
            //-------------------------------------------------
            if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
               if ($image = UploadedFile::getInstance($modelForm, 'image'))
               {
                    $model->image = $modelForm->uploadImage($image);
               }

                $model->title = $modelForm->title;
                $model->intro = $modelForm->intro;
                $model->text = $modelForm->text;
                $model->author = $modelForm->author;
                $model->like = $modelForm->like;
                //$model->create_at = $modelForm->create_at ?:time();

                if ($model->save()) {
                    return $this->redirect(['views', 'id' => $model->id]);
                }
            }
            //-------------------------------------------------
            /*if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['views', 'id' => $model->id]);
            }*/

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelForm' => $modelForm
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'views' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelForm = new BlogForm($model);
        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
            if ($image = UploadedFile::getInstance($modelForm, 'image')) {
                $model->image = $modelForm->uploadImage($image, $model->image);
            }
            $model->title = $modelForm->title;
            $model->intro = $modelForm->intro;
            $model->text = $modelForm->text;
            $model->author = $modelForm->author;
            $model->like = $modelForm->like;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Изменения сохранены');
                return $this->redirect(['views', 'id' => $model->id]);
            }
        }
        /*if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['views', 'id' => $model->id]);
        }*/

        return $this->render('update', [
            'model' => $model,
            'modelForm' => $modelForm,
        ]);
    }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteImage($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->deleteImage();
            $model->image = '';
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Изображение удалено!');
            }
        }

        return $this->render('views', ['model' => $model]);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
