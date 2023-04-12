<?php

namespace app\controllers;

use app\models\Soya;
use app\models\Raw;
use app\models\Hmykh;
use app\models\Shrot;
use app\components\SoyaWidget;
use app\components\HmykhWidget;
use app\components\ShrotWidget;

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

        $month = Soya::find()->where(['like', 'weight', '25'])->all();

        $weight = Soya::find()->where(['like', 'month', 'январь'])->all();

        $query = 'select * from raw';

        $type = Raw::findBySql($query)->all();

        $postvalue = !empty($_POST['value']) ? $_POST['value'] : '';
        $postweight = !empty($_POST['weight']) ? $_POST['weight'] : '';
        $postmonth = !empty($_POST['month']) ? $_POST['month'] : '';

        $answer = '';
        switch ($postvalue) {
            case 'соя':
                foreach ($dataSoya as $dsoya) {
                    if ($dsoya['month'] === $postmonth and $dsoya['weight'] === $postweight) {
                        $answer = $dsoya['value'];
                    }
                }
            default:
                switch ($postvalue) {
                    case 'жмых':
                        foreach ($dataHmykh as $dh) {
                            if ($dh['month'] === $postmonth and $dh['weight'] === $postweight) {
                                $answer = $dh['value'];
                            }
                        }
                    default:
                        switch ($postvalue) {
                            case 'шрот':
                                foreach ($dataShrot as $dshrot) {
                                    if ($dshrot['month'] === $postmonth and $dshrot['weight'] === $postweight) {
                                        $answer = $dshrot['value'];
                                    }
                                }
                        }
                }
        }

        $values = 1;
        switch ($postvalue) {
            case 'жмых':
            case 'шрот':
            case 'соя':
                $values = 1;
            default:
                $values = 0;
        }

        $content = '';
        switch ($postvalue) {
            case 'жмых':
                $content = HmykhWidget::widget();
                break;
            case 'шрот':
                $content = ShrotWidget::widget();
                break;
            case 'соя':
                $content = SoyaWidget::widget();
                break;
            default:
                $content =  '<div class="nocontent">Ошибка! Выберите данные.</div>';
        }

        return $this->render('test', compact(
            'type',
            'month',
            'weight',
            'dataSoya',
            'dataHmykh',
            'dataShrot',
            'postmonth',
            'postweight',
            'postvalue',
            'answer',
            'values',
            'content'
        ));
    }
}
