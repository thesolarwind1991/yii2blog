<?php

use app\widgets\subscribe\SubscribeWidget;
/** @var yii\web\View $this */

$this->title = 'Портал Solaric Блог';
?><!-- banner -->
<!-- technology -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->
                <!--<div class="soci">
                    <ul>
                        <li><a href="#" class="facebook-1"> </a></li>
                        <li><a href="#" class="facebook-1 twitter"> </a></li>
                        <li><a href="#" class="facebook-1 chrome"> </a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
                    </ul>
                </div>-->
                <? //print_r($blogs);?>
                <? if (empty($blogs)) {?>
                <div class="tc-ch">
                    <div class="tch-img">
                        Записей нет на данной странице!
                    </div>
                </div>
                <div class="clearfix"></div>
                <? } else  {?>
                <? $i = 0;
                   foreach ($blogs as $blog) {
                ?><div class="tc-ch">

                    <div class="tch-img">
                        <a href="<?= yii\helpers\Url::to(['blog/views', 'id' => $blog->id]) ?>">
                            <!--<img src="/images/1.jpg" class="img-responsive" alt=""/>-->
                            <?=\yii\helpers\Html::img("@web/files/blog/{$blog->image}", ['alt' => $blog->title, 'height' => 260]);?>
                        </a>
                    </div>
                    <!--<a class="blog blue" href="<?//= yii\helpers\Url::to(['blogs/views', 'id' => $blog->id]) ?>">Технологии</a>-->
                    <h3><a href="<?= yii\helpers\Url::to(['blog/views', 'id' => $blog->id]) ?>"><?=$blog->title?></a></h3>
                    <p><?=$blog->intro;?></p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin"><?=$blog->author?> </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i><?=$blog->getDateText();?></li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog"><?=count($blog->blogcomment)?> Комментариев </a></li>
                            <!--<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>-->
                            <li><i class="glyphicon glyphicon-eye-open"> </i><?=$blog->look;?></li>
                        </ul>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                   <? }?>
                <? }?>

                <div class="clearfix"></div>
                <a href="<?=yii\helpers\Url::to(['blog/index']);?>" class="btn btn-success">Перейти в блоги</a>
                <? //echo \yii\widgets\LinkPager::widget(['pagination' => $pages,]);?>
                <div class="clearfix"></div>
                <!-- technology-top -->
                <!-- technology-top -->
                <!--<div class="soci">
                    <ul>
                        <li><a href="#" class="facebook-1"> </a></li>
                        <li><a href="#" class="facebook-1 twitter"> </a></li>
                        <li><a href="#" class="facebook-1 chrome"> </a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
                    </ul>
                </div>
                <div class="tc-ch">

                    <div class="tch-img">
                        <a href="singlepage.html"><img src="/images/2.jpg" class="img-responsive" alt=""/></a>
                    </div>
                    <a class="blog pink" href="singlepage.html">Science</a>
                    <h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                            <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                            <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                        </ul>
                    </div>
                </div>
                <!-- technology-top -->
                <!-- technology-top -->
                <!--<div class="soci">
                    <ul>
                        <li><a href="#" class="facebook-1"> </a></li>
                        <li><a href="#" class="facebook-1 twitter"> </a></li>
                        <li><a href="#" class="facebook-1 chrome"> </a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
                    </ul>
                </div>
                <div class="tc-ch">

                    <div class="tch-img">
                        <a href="singlepage.html"><img src="/images/3.jpg" class="img-responsive" alt=""/></a>
                    </div>
                    <a class="blog gren" href="singlepage.html">Culture</a>
                    <h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                            <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                            <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                        </ul>
                    </div>
                </div>
                <!-- technology-top -->
                <!-- technology-top -->
                <!--<div class="soci">
                    <ul>
                        <li><a href="#" class="facebook-1"> </a></li>
                        <li><a href="#" class="facebook-1 twitter"> </a></li>
                        <li><a href="#" class="facebook-1 chrome"> </a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
                    </ul>
                </div>
                <div class="tc-ch">
                    <div class="tch-img">
                        <a href="singlepage.html"><img src="/images/4.jpg" class="img-responsive" alt=""/></a>
                    </div>
                    <a class="blog orn" href="singlepage.html">Business</a>
                    <h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                            <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                            <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                        </ul>
                    </div>
                </div>
                <!-- technology-top -->
                <!-- technology-top -->
                <!--<div class="soci">
                    <ul>
                        <li><a href="#" class="facebook-1"> </a></li>
                        <li><a href="#" class="facebook-1 twitter"> </a></li>
                        <li><a href="#" class="facebook-1 chrome"> </a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
                    </ul>
                </div>
                <div class="tc-ch">

                    <div class="tch-img">
                        <a href="singlepage.html"><img src="/images/5.jpg" class="img-responsive" alt=""/></a>
                    </div>
                    <a class="blog blue" href="singlepage.html">Technology</a>
                    <h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                            <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                            <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                        </ul>
                    </div>
                </div>
                <!-- technology-top -->
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">
            <!--<div class="blo-top">
                <div class="tech-btm">
                    <img src="images/banner1.jpg" class="img-responsive" alt=""/>
                </div>
            </div>-->
            <div class="blo-top">
                <?=SubscribeWidget::widget(); ?>
                <!--<div class="tech-btm">
                    <h4>Подписаться на рассылку</h4>
                    <p>Введите свой почтовый ящик для получения актуальных новостей</p>
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
            </div>
            <!--
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Top stories of the week </h4>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="/images/6.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="/images/7.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="/images/11.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="/images/9.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="/images/10.jpg" class="img-responsive" alt=""/></a>
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
<div class="clearfix"></div>



