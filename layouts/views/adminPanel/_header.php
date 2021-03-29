<?php
use yii\helpers\Url;
use \yii\helpers\Html;
?>

<header class="main-header">
    <a href="<?=Url::to('/',true) ?>" class="logo">
        <span class="logo-mini"><?=Yii::$app->name?></span>
        <span class="logo-lg"><?=Yii::$app->name?></span>
    </a>
    <nav class="navbar navbar-static-top p-0">
        <a href="#" class="sidebar-toggle fas fa-bars" data-toggle="push-menu" role="button">
        </a>
        <div class="navbar-custom-menu">
            <?= Html::a('RU', \yii\helpers\Url::to('/i18n/language'), ['class' => ' dropdown-item', 'data-method' => 'POST',
                'data-params' => [
                    'language' => 'ru_RU',
                    'url' => \yii\helpers\Url::current()
                ],]) ?>
            <?=
            Html::a('EN', \yii\helpers\Url::to('/i18n/language'), ['class' => 'dropdown-item', 'data-method' => 'POST',
                'data-params' => [
                    'language' => 'en_US',
                    'url' => \yii\helpers\Url::current()
                ],])
            ?>
        </div>
    </nav>
</header>

