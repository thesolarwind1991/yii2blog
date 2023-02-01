<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Blog;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блоги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <? Pjax::begin();?>
    <p>
        <?= Html::a('Создать блог', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'intro:ntext',
            //'text:ntext',
           // 'create_at',
            [
                'attribute' => 'create_at',
                'format' => ['date', 'php:d.m.Y h:i:s'],
                'label' => 'Создано'
            ],
            [
                'value' => function(Blog $model) {
                    return Html::img($model->getImagePath(), ['width' => 100, 'alt' => $model->title]);
                },
                'label' => 'Изображение',
                'format' => 'raw'
            ],
            //'update_at',
            //'author',
            //'image',
            //'like',
            //'look',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blog $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    <? Pjax::end();?>

</div>
