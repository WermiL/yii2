<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini skin-green">
<?php $this->beginBody() ?>
    <div class="wrapper">
<header class="main-header">
    <?= $this->render('_header') ?>
</header>
<aside class="main-sidebar">
    <?= $this->render('_leftSidebar') ?>
</aside>
<div class="content-wrapper">
    <?= $this->render('_main', [
        'content' => $content
    ]) ?>
</div>
<footer class="main-footer p-1">
    <?= $this->render('_footer') ?>
</footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
