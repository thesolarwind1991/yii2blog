<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Blog;
use app\modules\admin\models\Blogtags;
use app\modules\admin\models\BlogtagsSearch;
use app\modules\admin\models\Tags;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * BlogtagsController implements the CRUD actions for Blogtags model.
 */
class BlogtagsController extends Controller
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
     * Lists all Blogtags models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlogtagsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogtags model.
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
     * Creates a new Blogtags model.
     * If creation is successful, the browser will be redirected to the 'views' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blogtags();
        $blognames = Blog::find()->all();
        $itemsblog = ArrayHelper::map($blognames, 'id', 'title');
        $paramsblog = [
            'prompt' => '- Укажите название блога -'
        ];

        $tagnames = Tags::find()->all();
        $itemstag = ArrayHelper::map($tagnames, 'id', 'tag');
        $paramstag = [
            'prompt' => '- Укажите название тега -'
        ];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['views', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create',
            compact('model','itemsblog', 'paramsblog', 'itemstag', 'paramstag'));
    }

    /**
     * Updates an existing Blogtags model.
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

        $tagnames = Tags::find()->all();
        $itemstag = ArrayHelper::map($tagnames, 'id', 'tag');
        $paramstag = [
            'prompt' => '- Укажите название тега -'
        ];
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['views', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'itemsblog' => $itemsblog,
            'paramsblog' => $paramsblog,
            'itemstag' => $itemstag,
            'paramstag' => $paramstag
        ]);
    }

    /**
     * Deletes an existing Blogtags model.
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
     * Finds the Blogtags model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blogtags the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogtags::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
