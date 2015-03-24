<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Authorization');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode(Yii::t('app', 'User authorization')) ?></h1>
    <p><?= Html::encode(Yii::t('app', 'Please fill out the following fields to login')) ?>:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->label(Yii::t('app', 'Username')) ?>
                <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('app', 'Password')) ?>
                <?= $form->field($model, 'rememberMe')->checkbox()->label(Yii::t('app', 'Remember Me')) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
