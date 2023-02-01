<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blogtags */

$this->title = 'Обновление тега блога: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Теги блогов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['views', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="blogtags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsblog' => $itemsblog,
        'paramsblog' => $paramsblog,
        'itemstag' => $itemstag,
        'paramstag' => $paramstag
    ]) ?>

</div>
