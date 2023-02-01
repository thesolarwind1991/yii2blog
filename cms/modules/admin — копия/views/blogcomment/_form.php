<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blogcomment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogcomment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'blog_id')->textInput() ?>
    <?= $form->field($model, 'blog_id')->dropDownList($itemsblog, $paramsblog); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'create_comm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
