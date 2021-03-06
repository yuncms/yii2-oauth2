<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yuncms\user\frontend\widgets\Connect;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapPluginAsset;

YiiAsset::register($this);
BootstrapPluginAsset::register($this);

if (!empty($this->title)) {
    $this->title .= ' - ' . $this->params['title'];
} else {
    $this->title = $this->params['title'];
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= Html::tag('title', Html::encode($this->title)); ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php $form = ActiveForm::begin([
    'id' => 'login-modal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'validateOnBlur' => false,
    'validateOnType' => false,
    'validateOnChange' => false,
]); ?>

<div class="modal-header">
    <h2 class="modal-title">
        <?= Yii::t('oauth2', 'Sign in with your {siteName} account',['siteName'=>Yii::$app->name]) ?>
    </h2>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus',]]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= Html::submitButton(Yii::t('oauth2', 'Login'), ['class' => 'btn btn-primary btn-block  mt-10']) ?>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 mt-10">
            <div style="margin-top: 15px;"><?= Yii::t('oauth2', 'Quick login') ?></div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 15px;">
                    <?= Connect::widget([
                        'baseAuthUrl' => ['/user/security/auth'],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
