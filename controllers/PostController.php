<?php

namespace app\controllers;

use app\models\Soya;
use app\models\Raw;
use app\models\Hmykh;
use app\models\Shrot;

class PostController extends AppController
{

    public $layout = 'basic';

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionTest()
    {

        $this->view->title = 'Калькулятор';

        $dataSoya = Soya::find()->all();

        $dataHmykh = Hmykh::find()->all();

        $dataShrot = Shrot::find()->all();

        $catsMonth = Soya::find()->where(['like', 'weight', '25'])->all();

        $catsWeight = Soya::find()->where(['like', 'month', 'январь'])->all();

        $query2 = 'select * from raw';

        $type = Raw::findBySql($query2)->all();

        return $this->render('test', compact('type', 'catsMonth', 'catsWeight', 'dataSoya', 'dataHmykh', 'dataShrot'));
    }
}
