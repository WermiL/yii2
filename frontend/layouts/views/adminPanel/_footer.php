<?php

use yii\helpers\Html;

?>

<div class="col-12">
    <div class="d-flex align-items-center">
        <p class="text-muted m-0">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <?= Html::a('Contact', ['/site/contact'], ['class' => 'ml-auto btn btn-outline-secondary']) ?>
    </div>
</div>
