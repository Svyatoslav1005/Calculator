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

        $query = 'select * from raw';

        $month = [
            "January" => "Январь",
            "February" => "Февраль",
            "August" => "Август",
            "September"  => "Сентябрь",
            "October" => "Октябрь",
            "November" => "Ноябрь",
        ];

        $weight = [
            "25 тонн" => "25 тонн",
            "50 тонн" => "50 тонн",
            "75 тонн" => "75 тонн",
            "100 тонн"  => "100 тонн",
        ];

        $type = [
            "hmykh" => "Жмых",
            "shrot" => "Шрот",
            "soya" => "Соя",
        ];

        $datamonth = '';
        $datatype = '';
        $dataweigh = '';

        $postmonth = !empty($_POST['month']) ? $_POST['month'] : '';
        $posttype = !empty($_POST['type']) ? $_POST['type'] : '';
        $postweight = !empty($_POST['weight']) ? $_POST['weight'] : '';

        if ($postmonth != '' and $posttype != '' and $postweight != '') {
            $datamonth = $month[$postmonth];
            $datatype = $type[$posttype];
            $dataweigh = $weight[$postweight];
        }

        $answer = '';
        switch ($posttype) {
            case 'soya':
                foreach ($dataSoya as $dsoya) {
                    if ($dsoya['month'] === $postmonth and $dsoya['weight'] === $postweight) {
                        $answer = $dsoya['value'];
                    }
                }
                break;
            case 'hmykh':
                foreach ($dataHmykh as $dh) {
                    if ($dh['month'] === $postmonth and $dh['weight'] === $postweight) {
                        $answer = $dh['value'];
                    }
                }
                break;
            case 'shrot':
                foreach ($dataShrot as $dshrot) {
                    if ($dshrot['month'] === $postmonth and $dshrot['weight'] === $postweight) {
                        $answer = $dshrot['value'];
                    }
                }
                break;
        }

        $values = 1;
        switch ($posttype) {
            case 'hmykh':
            case 'shrot':
            case 'soya':
                $values = 1;
            default:
                $values = 0;
        }



        $content = '';
        switch ($posttype) {
            case 'hmykh':
                $content = HmykhWidget::widget();
                break;
            case 'shrot':
                $content = ShrotWidget::widget();
                break;
            case 'soya':
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
            'posttype',
            'answer',
            'values',
            'content',
            'datamonth',
            'datatype',
            'dataweigh',
        ));
    }
}
