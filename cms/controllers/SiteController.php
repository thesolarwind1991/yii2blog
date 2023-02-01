<?php

namespace app\controllers;

use app\models\Blog;
use app\models\Subscribe;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\AppController;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main_main';
        $query = Blog::find();
        $pages = new Pagination(['totalCount' => $query->count(),
                                 'pageSize' => 5,
                                 'forcePageParam' => false,
                                 'pageSizeParam' => false
                                ]);
        $blogs = $query->offset($pages->offset)->orderBy('create_at DESC')->limit($pages->limit)->with('blogcomment')->all();
        $this->setMeta('Портал Solaric-Блоги');
        return $this->render('index', compact('blogs','pages', 'query'));
    }

    public function actionSubscribe()
    {
        $subscribe = new Subscribe();

        if ($subscribe->load(Yii::$app->request->post())) {
            $email = Yii::$app->request->post();
            $email = $email['Subscribe']['email'];
            $exi = Subscribe::find()->where(['email' => $email])
                   ->all();

            if (count($exi) > 0) {
                Yii::$app->session->setFlash('error', 'Вы уже подписаны на новости!');
                //return $this->render('subscribe');

            } else {
                if ($subscribe->save()) {
                    Yii::$app->session->setFlash('success', 'Вы успешно подписались на новости! ');
                    //return $this->refresh();
                    //return $this->render('subscribe');
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка подписки!');
                    //return $this->render('subscribe');

                }
            }
        }
        return $this->render('subscribe');
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
