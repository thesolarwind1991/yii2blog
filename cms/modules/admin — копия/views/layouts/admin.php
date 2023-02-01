<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <? $this->head(); ?>
    <!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />-->
</head>
<body>
<?php $this->beginBody() ?>
<!--start-main-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="<?=Url::to(['/admin'])?>"><h1>Админка <?=Yii::$app->name?></h1></a>
            </div>
            <div class="search">
                <form action="<?=\yii\helpers\Url::to(['/blog/search']) ?>">
                    <input type="text" name="find" value="Поиск" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск';}">
                    <input type="submit" value="">
                </form>
            </div>
            <!--<div class="social">
                <ul>
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="facebook twitter"> </a></li>
                    <li><a href="#" class="facebook chrome"> </a></li>
                    <li><a href="#" class="facebook in"> </a></li>
                    <li><a href="#" class="facebook beh"> </a></li>
                    <li><a href="#" class="facebook vem"> </a></li>
                    <li><a href="#" class="facebook yout"> </a></li>
                </ul>
            </div>-->
            <div class="clearfix"></div>
        </div>
    </div>

    <!--head-bottom-->
    <div class="head-bottom">
        <div class="container">
            <?php
            NavBar::begin([
                // 'brandLabel' => Yii::$app->name,
                // 'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark_ fixed-top',
                              'style' => 'margin-bottom: 0px'
                             ]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/admin']],
                    ['label' => 'Сайт Solaric', 'url' => ['/site/index']],
                    ['label' => 'Теги', 'url' => ['/admin/tags']],
                    ['label' => 'Теги блогов', 'url' => ['/admin/blogtags']],
                    ['label' => 'Комментарии', 'url' => ['/admin/blogcomment']],
                   // ['label' => 'О нас', 'url' => ['/site/about']],
                   // ['label' => 'Контакты', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest
                        ? ['label' => 'Вход', 'url' => ['/site/login']]
                        : '<li class="nav-item">'
                        . Html::beginForm(['/site/logout'])
                        . Html::submitButton(
                            'Выход (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'nav-link btn_ btn-link_ logout',
                                'style' => 'background: #111; margin-top:3px',
                            ]
                        )
                        . Html::endForm()
                        . '</li>'
                ]
            ]);
            NavBar::end();
            ?>
            <!--<div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--<div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="videos.html">Videos</a></li>
                    <li><a href="reviews.html">Reviews</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tech <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="tech.html">Action</a></li>
                            <li><a href="tech.html">Action</a></li>
                            <li><a href="tech.html">Action</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Culture <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="singlepage.html">Action</a></li>
                            <li><a href="singlepage.html">Action</a></li>
                            <li><a href="singlepage.html">Action</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Science <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="singlepage.html">Action</a></li>
                            <li><a href="singlepage.html">Action</a></li>
                            <li><a href="singlepage.html">Action</a></li>
                        </ul>
                    </li>
                    <li><a href="design.html">Design</a></li>
                    <li><a href="business.html">Business</a></li>
                    <li><a href="world.html">World</a></li>
                    <li><a href="forum.html">Forum</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </div>
    <!--head-bottom-->
</div>

<div class="container" style="margin-top: 15px;">
    <?=$content;?>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-left">
            <h6>Solaric Блог</h6>
            <p>Сайт-шпаргалка для программиста, аккумулирование знаний.</p>
            <p>Советы, статьи, заметки, шпаргалки, видео-материалы по программированию</p>
        </div>
        <!--<div class="col-md-4 footer-middle">
            <h4>Twitter Feed</h4>
            <div class="mid-btm">
                <p>Consectetur adipisicing</p>
                <p>Sed do eiusmod tempor</p>
                <!--<a href="https://w3layouts.com/">https://w3layouts.com/</a>-->
        <!--    </div>

            <p>Consectetur adipisicing</p>
            <p>Sed do eiusmod tempor</p>
            <!--<a href="https://w3layouts.com/">https://w3layouts.com/</a>-->

        <!--</div>
        <div class="col-md-4 footer-right">
            <h4>Quick Links</h4>
            <li><a href="#">Eiusmod tempor</a></li>
            <li><a href="#">Consectetur </a></li>
            <li><a href="#">Adipisicing elit</a></li>
            <li><a href="#">Eiusmod tempor</a></li>
            <li><a href="#">Consectetur </a></li>
            <li><a href="#">Adipisicing elit</a></li>
        </div>-->
        <div class="clearfix"></div>
    </div>
</div>
<!-- footer -->
<!-- footer-bottom -->
<!--<div class="foot-nav">
    <div class="container">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="videos.html">Videos</a></li>
            <li><a href="reviews.html">Reviews</a></li>
            <li><a href="tech.html">Tech</a></li>
            <li><a href="singlepage.html">Culture</a></li>
            <li><a href="singlepage.html">Science</a></li>
            <li><a href="design.html">Design</a></li>
            <li><a href="business.html">Business</a></li>
            <li><a href="world.html">World</a></li>
            <li><a href="forum.html">Forum</a></li>
            <li><a href="contact.html">Contact</a></li>
            <div class="clearfix"></div>
        </ul>
    </div>
</div>-->
<!-- footer-bottom -->
<div class="copyright">
    <div class="container">
        <p>© 2022 <?=Yii::$app->name?>. Все права защищены </p>
    </div>
</div>

<!--<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

