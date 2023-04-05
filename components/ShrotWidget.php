<?php

namespace app\components;

use yii\base\Widget;

class ShrotWidget extends Widget
{

    public function run()
    {
        return $this->render('shrot');
    }
}
