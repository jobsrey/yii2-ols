<?php

namespace jobsrey\ols;

/**
 * ols module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'jobsrey\ols\controllers';

    public $urlRules = [
        'ols/<controller:.+>/<action:.+>/<slug:.+>' => '/ols/<controller>/<action>',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
