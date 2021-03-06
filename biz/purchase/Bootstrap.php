<?php

namespace biz\purchase;

use biz\app\components\Helper as AppHelper;

/**
 * Description of Bootstrap
 *
 * @author Misbahul D Munir (mdmunir) <misbahuldmunir@gmail.com>
 */
class Bootstrap extends \biz\app\base\Bootstrap
{
    protected $name = 'purchase';

    /**
     *
     * @param \yii\base\Application $app
     * @param array                 $config
     */
    protected function initialize($app, $config)
    {
        if ($app instanceof \yii\web\Application) {
            AppHelper::registerAccessHandler(models\Purchase::className(), components\AccessHandler::className());
        }
    }
}
