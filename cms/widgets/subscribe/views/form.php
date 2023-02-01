<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="tech-btm">
    <h4>Подпишись на нас</h4>
    <p>Введите свой e-mail, чтобы подписаться на наши новости</p>
    <? $form = ActiveForm::begin([
        'id' => 'subscribe-form',
        'action' => 'subscribe',
        'options' => [
               'class' => ''
        ]
    ])?>
    <div class="name">
        <!--<input type="text" placeholder="Email" required="">-->
        <?=$form->field($subscribe, 'email');?>
    </div>
    <div class="button">
        <!--<input type="submit" value="Подписаться">-->
        <?=Html::submitButton('Подписаться', ['class' => '']);?>
    </div>
    <? ActiveForm::end(); ?>
    <div class="clearfix"> </div>
</div>
