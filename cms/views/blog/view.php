<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\widgets\subscribe\SubscribeWidget;
?>
<!-- technology -->
<div class="technology-1">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="business">
                <div class=" blog-grid2">
                    <!--<img src="images/1.jpg" class="img-responsive" alt="">-->
                    <?=\yii\helpers\Html::img("@web/files/blog/{$blog->image}", ['alt' => $blog->title, 'width' => 700]);?>
                    <div class="blog-text">
                        <h5><?=$blog->title;?></h5>
                        <?=$blog->text;?>
                    </div>
                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin"><?=$blog->author?> </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i><?=$blog->getDateText(); ?></li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog"><?=count($comments)?> Комментариев </a></li>
                            <!--<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>-->
                            <li><i class="glyphicon glyphicon-eye-open"> </i><?=$blog->look;?></li>
                        </ul>
                    </div>
                    <div class="clearfix" style="margin-bottom: 25px;"></div>
                </div>
                <div class="comment-top">
                    <h2>Комментарии</h2>

                    <? if (empty($comments)) {?>
                      <h5>Комментариев нет</h5>
                    <?} else {?>
                    <? foreach ($comments as $comm) {?>
                    <div class="media-left">
                        <a href="#">
                            <?=\yii\helpers\Html::img("@web/images/si.png", ['alt' => $comm->username]);?>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$comm->username;?></h4>
                        <p><?=$comm->create_comm;?></p>
                        <p><?=$comm->text?></p>
                        <!-- Nested media object -->
                    </div>
                    <div class="clearfix" style="margin-bottom: 25px;"></div>
                    <? }
                    }?>
                        <!-- Nested media object -->
                        <!--<div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/si.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Rackham</h4>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                            </div>
                        </div>-->

                </div>
                <div class="comment">
                    <h3>Форма для комментариев</h3>
                    <?php if(Yii::$app->session->hasFlash('success') ): ?>
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

                    <!--<div class=" comment-bottom">-->
                        <? $form = ActiveForm::begin();?>
                        <?=$form->field($comm, 'username');?>
                        <?=$form->field($comm, 'email');?>
                        <?=$form->field($comm, 'text')->textarea(['rows' => 2, 'cols' => 5]);?>
                        <?=Html::submitButton('Написать', ['class' => 'btn btn-success btn_ord']);?>
                        <?=Html::resetButton('Очистить', ['class' =>'btn btn-danger']);?>
                        <? ActiveForm::end();?>
                        <!--<form>
                            <input type="text" placeholder="Имя">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Тема">
                            <textarea placeholder="Сообщение" required=""></textarea>
                            <input type="submit" value="Отправить" style="width: 200px">
                        </form>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right-1">
            <div class="blo-top">
                <?=SubscribeWidget::widget(); ?>
                <!--!!!!!!!!!!!!!!!!!<div class="tech-btm">
                    <h4>Подпишись на нас</h4>
                    <p>Введите свой e-mail, чтобы подписаться на наши новости</p>
                    <div class="name">
                        <form>
                            <input type="text" placeholder="Email" required="">
                        </form>
                    </div>
                    <div class="button">
                        <form>
                            <input type="submit" value="Подписаться">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>-->
            </div><!--
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Top stories of the week </h4>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="images/6.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="images/7.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="images/11.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="images/9.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="images/10.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
             -->
        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>
<!-- technology -->
