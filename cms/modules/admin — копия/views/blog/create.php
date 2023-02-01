<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blog */

$this->title = 'Создание блога';
$this->params['breadcrumbs'][] = ['label' => 'Блоги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelForm' => $modelForm
    ]) ?>

</div>
