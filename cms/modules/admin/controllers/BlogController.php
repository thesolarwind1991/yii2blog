<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Blog;
use app\modules\admin\models\BlogForm;
use app\modules\admin\models\BlogSubscribe;
use app\modules\admin\models\Subscribe;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\BlogSearch;
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

    public function actionEmail() {
        $model = new BlogSubscribe();
        $postM = Array();
        $Emails = Array();
        $modelBlog = Blog::find()->orderBy('id DESC')->all();
        $modelEmail = Subscribe::find()->orderBy('id')->asArray()->all();
        $itemsblog = ArrayHelper::map($modelBlog, 'id', 'title');
        $paramsblog = [
            'prompt' => '- Укажите название блога -'
        ];

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($modelEmail))
               if (is_array($modelEmail)) {
                   $postM = Yii::$app->request->post();
                   $id_ = $postM['BlogSubscribe']['name'];
                   $Blog = Blog::findOne($id_);

                   foreach ($modelEmail as $itemEmail) {
                       $title = (empty($Blog->title)) ? "Блог" : $Blog->title;
                       $text = (empty($Blog->text)) ? "Тут ничего нет" : $Blog->text;
                       $Emails[] = $model->contact($itemEmail['email'], "Solaric-блоги", $title, $text);
                   }
               }

            $emailstr = "";
            $emailstr = implode(', ', $Emails);
            /*   foreach ($Emails as $email)
                $emailstr .= " ".$email.",";
            */

            Yii::$app->session->setFlash('emails', 'Письма были отправлены к '.$emailstr);

            //return $this->refresh();
        }

        return $this->render('email', [
                'model' => $model,
                'itemsblog' => $itemsblog,
                'paramsblog' => $paramsblog,
                'modelEmail' => $modelEmail,

            ]);

    }

    /**
     * Lists all Blog models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        /*$dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
            'pagination' => [
                'pageSize' => 20
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);*/

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
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
        return $this->render('view', [
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
                    return $this->redirect(['view', 'id' => $model->id]);
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
                return $this->redirect(['view', 'id' => $model->id]);
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

        return $this->render('view', ['model' => $model]);
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
