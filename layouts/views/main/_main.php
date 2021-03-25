<?php
/* @var $content string */

use app\widgets\Alert;

?>
<div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
