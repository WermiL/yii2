<?php

namespace frontend\layouts\controller;

use yii\web\Controller;

/**
 * Backend controller
 */
class LayoutController extends Controller
{
    /**
     * Available layouts
     */
    const LAYOUT_MAIN = '@frontend/layouts/views/main/index.php';
    const LAYOUT_ADMIN_PANEL = '@frontend/layouts/views/adminPanel/index.php';

    /**
     * {@inheritdoc}
     */
    public $layout = self::LAYOUT_MAIN;
}
