<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\ButtonDropdown;

/**
 * Views backend page for user authorization
 *
 * @name login.php
 * @company W.D.M.Group, Ukraine <wdmg.com.ua@gmail.com>
 * @author Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @release 25/03/2015
 * 
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $model \common\models\LoginForm
 * 
 */

$this->title = Yii::t('app', 'User authorization');

?>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-signin'],
            'fieldConfig' => ['template' => '{beginWrapper}{input}<div class="col-sm-12 centered">{error}</div>{endWrapper}'],
        ]); ?>
        <div id="auth-area" class="panel panel-default">
            <a href="#" class="panel-helper" rel="tooltip" data-placement="bottom" data-original-title="<?= Html::encode(Yii::t('app', 'Please fill out the following fields to login')) ?>">
                <span class="glyphicon glyphicon-question-sign"></span>
            </a>
            <div class="panel-heading">
                <img id="profile-img" class="user-img" src="/admin/img/logotypes/cms-logo-md.jpg" alt="Butterfly.CMS" title="Butterfly.CMS - <?= Yii::t('app', 'Innovation Content Management System') ?>" />
                <h3 id="profile-name" class="user-name centered"><img src="/admin/img/logotypes/cms-slogan-lg.png" alt="Butterfly.CMS" title="Butterfly.CMS - <?= Yii::t('app', 'Innovation Content Management System') ?>" /></h3>
            </div>
            <div class="panel-body">
                <span id="reauth-email" class="reauth-email"></span>
                <?= $form->field($model, 'username')->input('text',['value'=>'','placeholder'=>Yii::t('app', 'Username')]) ?>
                <?= $form->field($model, 'password')->input('password',['value'=>'','placeholder'=>Yii::t('app', 'Password')]) ?>
                <?= $form->field($model, 'rememberMe')->checkbox()->label('- '.Yii::t('app', 'remember me'), ['class' => 'control-label col-sm-6']) ?>
                <?= ButtonDropdown::widget([
                    'label' => Yii::t('app', 'Select language'),
                    'containerOptions' => ['id' => 'language-select', 'class'=>'pull-right'],
                    'dropdown' => [
                        'items' => [
                            ['label' => Yii::t('app', 'English'), 'url' => '#'],
                            ['label' => Yii::t('app', 'Russian'), 'url' => '#'],
                            ['label' => Yii::t('app', 'Ukrainian'), 'url' => '#']
                        ],
                    ],
                ]); ?>
                <?= $form->field($model, 'language')->input('hidden',['value'=>'']) ?>
            </div>
            <div class="panel-footer">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-lg btn-primary btn-block btn-signin', 'name' => 'login-button']) ?>
                <a href="<?= Yii::$app->urlManagerFrontEnd->createUrl('/') ?>" class="link centered"><span aria-hidden="true">&larr;</span> <?= Yii::t('app', 'back to frontend') ?></a>
            </div>
        </div>
        <?php ActiveForm::end(); ?>