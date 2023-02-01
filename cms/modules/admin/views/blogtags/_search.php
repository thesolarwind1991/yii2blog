<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BlogtagsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogtags-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?//= $form->field($model, 'blog_id') ?>
    <?= $form->field($model, 'blogName') ?>
    <?//= $form->field($model, 'tag_id') ?>
    <?= $form->field($model, 'tagName') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Очистка', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
