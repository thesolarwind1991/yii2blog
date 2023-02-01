<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Blog;
use app\modules\admin\models\Blogcomment;
use app\modules\admin\models\BlogcommentSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogcommentController implements the CRUD actions for Blogcomment model.
 */
class BlogcommentController extends Controller
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
     * Lists all Blogcomment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlogcommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogcomment model.
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
     * Creates a new Blogcomment model.
     * If creation is successful, the browser will be redirected to the 'views' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blogcomment();
        $blognames = Blog::find()->all();
        $itemsblog = ArrayHelper::map($blognames, 'id', 'title');
        $paramsblog = [
            'prompt' => '- Укажите название блога -'
        ];
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['views', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'itemsblog' => $itemsblog,
            'paramsblog' => $paramsblog
        ]);
    }

    /**
     * Updates an existing Blogcomment model.
     * If update is successful, the browser will be redirected to the 'views' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $blognames = Blog::find()->all();
        $itemsblog = ArrayHelper::map($blognames, 'id', 'title');
        $paramsblog = [
            'prompt' => '- Укажите название блога -'
        ];

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['views', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'itemsblog' => $itemsblog,
            'paramsblog' => $paramsblog
        ]);
    }

    /**
     * Deletes an existing Blogcomment model.
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

    /**
     * Finds the Blogcomment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blogcomment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogcomment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
