<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model frontend\modules\user\models\forms\SignInForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Sign in';
?>
<div class="site-sign-in">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in with email</p>

                <?php $form = ActiveForm::begin(['id' => 'sign-in-form']); ?>

                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'autofocus' => true])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

                <div class="row mt-4">
                    <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'form-group col-8 d-flex align-items-center']])->checkbox() ?>
                    <div class="form-group col-4">
                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <!--                <div class="social-auth-links text-center mb-3 mt-0">-->
                <!--                    <p>- OR -</p>-->
                <!--                    <a href="#" class="btn btn-block btn-danger">-->
                <!--                        <i class="fab fa-google mr-2"></i> Sign in with Google-->
                <!--                    </a>-->
                <!--                </div>-->
                <div class="text-muted mt-4">
                    If you forgot your password you can <?= Html::a('reset it', ['/user/sign-in/reset-password']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['/user/sign-up/resend-verification-email']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
