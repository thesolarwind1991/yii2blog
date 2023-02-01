<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blogtags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogtags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'blog_id')->textInput() ?>
    <?= $form->field($model, 'blog_id')->dropDownList($itemsblog, $paramsblog); ?>

    <?//= $form->field($model, 'tag_id')->textInput() ?>
    <?= $form->field($model, 'tag_id')->dropDownList($itemstag, $paramstag);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
