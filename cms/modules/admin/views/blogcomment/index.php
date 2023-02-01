<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Blogcomment;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BlogcommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии блога';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogcomment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать комментарий', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'blog_id',
            [
                'attribute' => 'blog_id',
                'label' => 'Заголовок блога',
                'format' => 'text',
                'content' => function($data) {
                    return $data->getBlogName();
                }
            ],
            'username',
            //'email:email',
            'text:ntext',
            //'create_comm',
            [
                'attribute' => 'create_comm',
                'format' => ['date', 'php:d.m.Y h:i:s'],
                'label' => 'Создано'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blogcomment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
