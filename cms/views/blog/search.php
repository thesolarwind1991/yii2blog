<?php ?>
<div class="technology-1">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="vide-1">
				<!--<div class="rev">
					<div class="rev-img">
						<a href="singlepage.html"><img src="images/4.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="rev-info">
						<h3><a href="singlepage.html">Incididunt ut labore et dolore</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.isicing </p>
					</div>
					<div class="clearfix"></div>
				</div>-->
                <? if (empty($blogs)) {?>
                    <div class="tc-ch">
                        <div class="tch-img">
                            <h3>Поиск: Записей нет на данной странице!</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <? } else  {?>
                <? $i = 0;?>
                    <div class="tc-ch">
                        <div class="tch-img">
                            <h3>Поиск: <?=$find?></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?foreach ($blogs as $blog) {
                ?>
                <a href="<?= yii\helpers\Url::to(['blog/views', 'id' => $blog->id]) ?>">
                    <?=\yii\helpers\Html::img("@web/files/blog/{$blog->image}", ['alt' => $blog->title, 'width' => 700]);?>
                </a>
					<h3><a href="<?= yii\helpers\Url::to(['blog/views', 'id' => $blog->id]) ?>"><?=$blog->title;?></a></h3>
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
                    <div class="clearfix" style="margin-bottom: 25px;"></div>
                  <? } ?>
                <? } ?>

			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right-1">

				<div class="blo-top">
					<div class="tech-btm">
					<h4>Подписаться</h4>
					<p>Введите свой e-mail для получения регулярных новостей</p>
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
					</div>
				</div>
            <!--
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
        <? if (!empty($pages)){
           echo \yii\widgets\LinkPager::widget(['pagination' => $pages,]);
          }
           ?>
        <div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
