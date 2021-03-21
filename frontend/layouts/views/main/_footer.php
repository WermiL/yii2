<?php

use yii\helpers\Html;

?>

<div class="container">
    <div class="d-flex align-items-center pt-1 mt-2">
        <p class="text-muted m-0">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <?= Html::a('Contact', ['/site/contact'], ['class' => 'ml-auto btn btn-outline-secondary']) ?>
    </div>
</div>
