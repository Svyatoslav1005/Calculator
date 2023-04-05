<?php

namespace app\components;

use yii\base\Widget;

class SoyaWidget extends Widget
{

    public function run()
    {
        return $this->render('soya');
    }
}
