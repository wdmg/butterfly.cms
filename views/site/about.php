<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use wdmg\guard\models\Security;
use wdmg\helpers\StringHelper;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

/*
$ip = "176.109.190.120";
$cidr = \wdmg\helpers\IpAddressHelper::ip2cidr($ip);
var_export($cidr);

$ip = "176.109.190.120";
$cidr = \wdmg\helpers\IpAddressHelper::ip2cidr($ip, 2);
var_export($cidr);
*/

/*
$domain = "176.109.190.120";
$whois = \wdmg\helpers\IpAddressHelper::whois($domain);
echo $whois;
*/

/*
$security = new Security();
var_dump($security->setBlock('xss'));*/


var_dump(StringHelper::genUUID());
var_dump(StringHelper::genUUID());
var_dump(StringHelper::genUUID());
var_dump(StringHelper::genUUID());
var_dump(StringHelper::genUUID());


?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'], // стили ul
        'items' => \Yii::$app->menu->getItems(7, true),
        'encodeLabels' =>false,
    ]); ?>
</div>
