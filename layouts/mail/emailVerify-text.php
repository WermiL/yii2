<?php

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\records\user\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>

Follow the link below to verify your email:

<?= $verifyLink ?>
