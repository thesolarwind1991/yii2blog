<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Blogtags;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BlogtagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Теги блогов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogtags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание тега блога', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'tag_id',
            [
                   'attribute' => 'tag_id',
                   'label' => 'Имя тега',
                   'format' => 'text',
                   'content' => function($data) {
                       return $data->getTagName();
                   }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blogtags $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
