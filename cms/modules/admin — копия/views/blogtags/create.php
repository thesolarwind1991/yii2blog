<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blogtags */

$this->title = 'Создание тегов блога';
$this->params['breadcrumbs'][] = ['label' => 'Теги блогов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogtags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsblog' => $itemsblog,
        'paramsblog' => $paramsblog,
        'itemstag' => $itemstag,
        'paramstag' => $paramstag
    ]) ?>

</div>
