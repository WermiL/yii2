<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
    ],
]);
$menuItems = [];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Sign in', 'url' => ['/user/sign-in'], 'linkOptions' => ['class' => 'btn btn-outline-secondary text-light']];
    $menuItems[] = ['label' => 'Sign up', 'url' => ['/user/sign-up'], 'linkOptions' => ['class' => 'btn btn-outline-secondary text-light']];
} else {
    $menuItems[] = '<li class="nav-item">'
        . Html::beginForm(['/user/sign-in/sign-out'], 'post')
        . Html::submitButton(
            'Sign out (' . Yii::$app->user->identity->email . ')',
            ['class' => 'btn btn-outline-secondary text-light nav-link']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>

