<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelForm, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelForm, 'intro')->textarea(['rows' => 6]) ?>

    <?//= $form->field($modelForm, 'text')->textarea(['rows' => 6]) ?>
    <?= $form->field($modelForm, 'text')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]);?>
    <?//= $form->field($model, 'create_at')->textInput() ?>

    <?//= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($modelForm, 'author')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <div class="blog-image">
       <img src="<?=$model->getImagePath()?>" alt="" width="300">
    </div>
    <?=$form->field($modelForm, 'image')->fileInput()?>

    <?= $form->field($modelForm, 'like')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
