<?php

namespace app\modules\i18n\controllers;

use app\layouts\controller\LayoutController;
use app\modules\i18n\models\forms\LanguageSelectionForm;
use Yii;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class LanguageController extends LayoutController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Set Language
     */
    public function actionIndex()
    {
        $_languageSelectionForm = new LanguageSelectionForm();
        $_languageSelectionForm->language = Yii::$app->request->post('language');
        $_languageSelectionForm->url = Yii::$app->request->post('url');
        if ($_languageSelectionForm->validate()) {
            {
                $_languageSelectionForm->setLanguage();
                $this->redirect($_languageSelectionForm->url);
            }
        }
    }
}
