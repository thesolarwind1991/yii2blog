<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">
    <?php if(Yii::$app->session->hasFlash('emails') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('emails'); ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(['id' => 'IDsubscribeEmail']); ?>

    <?= $form->field($model, 'name')->dropDownList($itemsblog, $paramsblog); ?>
    <div class="form-group">
        <?= Html::submitButton('Разослать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
