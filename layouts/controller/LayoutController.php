<?php

namespace app\layouts\controller;

use yii\web\Controller;

/**
 * Backend controller
 */
class LayoutController extends Controller
{
    /**
     * Available layouts
     */
    const LAYOUT_MAIN = '@app/layouts/views/main/index.php';
    const LAYOUT_ADMIN_PANEL = '@app/layouts/views/adminPanel/index.php';

    /**
     * {@inheritdoc}
     */
    public $layout = self::LAYOUT_MAIN;
}
