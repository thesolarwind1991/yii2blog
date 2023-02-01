<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blogcomment */

$this->title = 'Обновить комментарий: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии блога', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['views', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="blogcomment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsblog' => $itemsblog,
        'paramsblog' => $paramsblog
    ]) ?>

</div>
