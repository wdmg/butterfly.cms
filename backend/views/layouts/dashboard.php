<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs; 

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <?php
        NavBar::begin([
            /*'brandLabel' => '<span>Butter<span>fly</span></span>.CMS',*/
            'brandLabel' => '<img src="'.Yii::$app->homeUrl.'img/cms-logotype.png" />',
            'brandUrl' => Yii::$app->homeUrl,
            'innerContainerOptions' => ['class'=>'container-fluid'],
            'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
        ]);
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
        } else {
        	$menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-cog"></span> '.Yii::t('app','Administration'),
            		'items' => [
            			['label' => '<span class="glyphicon glyphicon-wrench"></span> '.Yii::t('app','Global settings'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-off"></span> '.Yii::t('app','User accounts'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-floppy-save"></span> '.Yii::t('app','Backup manager'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-fire"></span> '.Yii::t('app','System service'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-info-sign"></span> '.Yii::t('app','System logs'), 'url' => ['/site/index']],
                        '<li class="divider"></li>',
                        ['label' => '<span class="glyphicon glyphicon-question-sign"></span> '.Yii::t('app','Help'), 'url' => ['/site/index']],
                        ['label' => '<span class="glyphicon glyphicon-flash"></span> '.Yii::t('app','Bug report'), 'url' => ['/site/index']],
           			],
            ];
        	$menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-th-large"></span> '.Yii::t('app','Modules'),
            		'items' => [
            			['label' => '<span class="glyphicon glyphicon-object-align-left"></span> '.Yii::t('app','Structure'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-lock"></span> '.Yii::t('app','Authorization'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-comment"></span> '.Yii::t('app','Messages'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-briefcase"></span> '.Yii::t('app','Medialibrary'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-picture"></span> '.Yii::t('app','Photogallery'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-film"></span> '.Yii::t('app','Videotube'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-music"></span> '.Yii::t('app','Audiocast'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-bullhorn"></span> '.Yii::t('app','News'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-education"></span> '.Yii::t('app','FAQ'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-pencil"></span> '.Yii::t('app','Blog'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-th-list"></span> '.Yii::t('app','Catalog'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> '.Yii::t('app','Store'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-search"></span> '.Yii::t('app','Search'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-envelope"></span> '.Yii::t('app','Feedback'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-star"></span> '.Yii::t('app','Reviews'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-object-align-horizontal"></span> '.Yii::t('app','Sitemap'), 'url' => ['/site/index']],
            			'<li class="divider"></li>',
            			['label' => '<span class="glyphicon glyphicon-download-alt"></span> '.Yii::t('app','Install manager'), 'url' => ['/site/index']],
            		],
            ];
        	$menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-tasks"></span> '.Yii::t('app','Tasks'),
            		'items' => [
            			['label' => '<span class="glyphicon glyphicon-bell"></span> '.Yii::t('app','Tickets'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-flag"></span> '.Yii::t('app','Moderating'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-time"></span> '.Yii::t('app','Scheduler'), 'url' => ['/site/index']],
            		],
            ];
        	$menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-stats"></span> '.Yii::t('app','Statistics'),
            		'items' => [
            			['label' => '<span class="glyphicon glyphicon-globe"></span> '.Yii::t('app','Site visitors'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-filter"></span> '.Yii::t('app','Search engine'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-hdd"></span> '.Yii::t('app','Resources'), 'url' => ['/site/index']],
           			],
            ];
            $username = Yii::$app->user->identity->username;
        	$menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-user"></span> '.Yii::t('app', 'Welcome, {username}', ['username' => $username]),
            		'items' => [
            			['label' => '<span class="glyphicon glyphicon-user"></span> '.Yii::t('app','Profile'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-cog"></span> '.Yii::t('app','Settings'), 'url' => ['/site/index']],
            			['label' => '<span class="glyphicon glyphicon-comment"></span> '.Yii::t('app','Messages'), 'url' => ['/site/index']],
            			[
                            'label' => '<span class="glyphicon glyphicon-log-out"></span> '.Yii::t('app','Logout'),
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
            		],
        	];
        }
        echo Nav::widget([
    		'options' => ['class' => 'navbar-nav navbar-right main-menu'],
            'encodeLabels' => false,
    		'items' => $menuItems,
    	]);
        NavBar::end();
    ?>
    <div id="sidebar-collapse" class="sidebar col-sm-4 col-md-3 col-lg-3">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu left-menu">
			<li class="parent">
				<a href="#pages-tree" data-toggle="collapse" aria-expanded="true" data-target="#pages-tree">
					<span class="glyphicon glyphicon-object-align-left"></span> <?= Yii::t('app','Structure'); ?> <span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
                <script type="text/javascript">
                    $(function () {
                        $('#pages-tree').collapse();
                    });
                </script>
                <ul id="pages-tree" class="tree children collapse">
                    <li>
                        <a href=""><span class="glyphicon glyphicon-folder-open"></span> Index</a> (site/index)
                        <ul class="sortable-list">
                            <li>
                            	<a href="#" draggable="true"><span class="glyphicon glyphicon-folder-open"></span> Child</a> (site/index)
                                <ul class="sortable-list">
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 1</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 2</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-folder-open"></span> Grand Child 3</a> (site/index)
                                        <ul class="sortable-list">
                                            <li>
                    	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 1</a> (site/index)
                                            </li>
                                            <li>
                    	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 2</a> (site/index)
                                            </li>
                                            <li>
                    	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 3</a> (site/index)
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#" draggable="true"><span class="glyphicon glyphicon-folder-open"></span> Child</a> (site/index)
                                <ul class="sortable-list">
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 1</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 2</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 3</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 4</a> (site/index)
                                    </li>
                                    <li>
            	                        <a href="#" draggable="true"><span class="glyphicon glyphicon-file"></span> Grand Child 5</a> (site/index)
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>


		<!--ul class="nav menu left-menu">
			<li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li><a href="widgets.html"><span class="glyphicon glyphicon-th"></span> Widgets</a></li>
			<li><a href="charts.html"><span class="glyphicon glyphicon-stats"></span> Charts</a></li>
			<li><a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span> Tables</a></li>
			<li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> Forms</a></li>
			<li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> Alerts &amp; Panels</a></li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Dropdown <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><span class="glyphicon glyphicon-user"></span> Login Page</a></li>
		</ul-->
        <div class="copyrights">Powered by <a href="http://butterflycms.com/">Butterfly.CMS</a></div>
    </div>
    <div class="content col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3">			
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
    
    
    
    
    
    
    
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>