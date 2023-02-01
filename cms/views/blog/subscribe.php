<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Подписка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p> <?php if(Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <br><br>
        Удачи, с уважением администрация Solaric!
    </p>

    <!--<code><?//= __FILE__ ?></code>-->
</div>
