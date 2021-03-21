<?php
/* @var $content string */

use frontend\widgets\Alert;

?>
<div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
