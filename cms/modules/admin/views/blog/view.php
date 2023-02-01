<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Blog;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Блоги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Удалить изображение', ['delete-image', 'id' => $model->id],
                    ['class' => 'btn btn-danger',
                     'data' => ['confirm' => 'Хотите удалить это изображение?',
                                'method' => 'post'
                               ]
             ]);

        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'intro:ntext',
            'text:html',
            'create_at',
            'update_at',
            'author',
            //'image',
            [
                 'value' => function(Blog $model) {
                    return Html::img($model->getImagePath(), ['width' => 200, 'alt' => $model->title]);
                 },
                 'label' => 'Изображение',
                 'format' => 'raw'
            ],
            'like',
        ],
    ]) ?>

</div>
