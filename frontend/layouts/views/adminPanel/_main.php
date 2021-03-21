<?php
/* @var $content string */

use frontend\widgets\Alert;

?>
<section class="content">
    <?= Alert::widget() ?>
    <?= $content ?>
</section>


