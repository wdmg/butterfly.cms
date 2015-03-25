<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
$this->registerJsFile('@web/js/login.js');

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
    <div class="container">
        <?= $content ?>
    </div>
    <footer class="footer navbar-fixed-bottom">
        <div class="container">
            <p class="col-md-4 pull-left"><?= Yii::t('app', 'Created by') ?> <a href="http://wdmg.com.ua/" target="_blank">W.D.M.Group</a>, <?= Yii::t('app', 'Ukraine') ?></p>
            <p class="col-md-4 pull-center">&copy; <a href="<?= Yii::$app->urlManagerFrontEnd->createUrl('/') ?>">Butterfly.CMS</a>, <?= date('Y') ?></p>
            <p class="col-md-4 pull-right"><?= Yii::t('app', 'Powered by') ?> <a href="http://www.yiiframework.com/" target="_blank">Yii Framework</a></p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
