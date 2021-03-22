<?php

namespace frontend\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * Breadcrumbs
 */
class Breadcrumbs extends \yii\bootstrap4\Breadcrumbs
{
    /**
     * {@inheritdoc}
     */
    public $homeLink = [
        'label' => 'Yii App',
        'url' => '/user/administration',
    ];

    /**
     * Renders the widget.
     * @throws InvalidConfigException
     */
    public function run()
    {
        $this->registerPlugin('breadcrumb');

        if (empty($this->links)) {
            return '';
        }
        $links = [];
        if ($this->homeLink === null) {
            $links[] = $this->renderItem([
                'label' => Yii::t('yii', 'Home'),
                'url' => Yii::$app->homeUrl,
            ], $this->itemTemplate);
        } elseif ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
        }
        foreach ($this->links as $link) {
            if (!is_array($link)) {
                $link = ['label' => $link];
            }
            $links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
        }
        return Html::tag($this->tag, implode('', $links), $this->options);
    }

}
