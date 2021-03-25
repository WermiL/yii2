<?php
/* @var $content string */

use app\widgets\Alert;

?>
<div class="content-wrapper pt-0 pb-2 px-2">
    <?= $content ?>
    <?= Alert::widget() ?>
</div>


