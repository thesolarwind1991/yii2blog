<?php

namespace app\controllers;

use app\models\Blog;
use app\models\Blogcomment;
use app\models\Subscribe;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\controllers\AppController;

class BlogController extends AppController
{
    public function actionIndex()
    {
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

    public function actionViews()
    {
        $id = Yii::$app->request->get('id');
        $blog = Blog::findOne($id);
        $blog->look = $blog->look + 1;
        $blog->save();
        $comments = $blog->getBlogcomment()->orderBy('create_comm')->all();
        $this->setMeta('Solaric Блоги | '.$blog->title);

        $comm = new Blogcomment();
        if ($comm->load(Yii::$app->request->post()))
        {
            $comm->blog_id = $blog->id;
            if ($comm->save()) {
                Yii::$app->session->setFlash('success', 'Ваш комментарий был принят!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка добавления комментария!');
            }
        }

        return $this->render('view', compact('blog', 'comments', 'comm'));
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

    public function actionSearch() {
        $find = trim(Yii::$app->request->get('find'));
        if (!$find) {
            return $this->render('search');
        }
        $query = Blog::find()->where(['like', 'title', $find]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 5,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $blogs = $query->offset($pages->offset)->orderBy('create_at DESC')->limit($pages->limit)->with('blogcomment')->all();
        return $this->render('search', compact('blogs', 'pages', 'find'));
    }

}
