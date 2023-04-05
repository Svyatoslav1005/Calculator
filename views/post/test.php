<?php

use yii\widgets\ActiveForm;
use app\components\SoyaWidget;
use app\components\HmykhWidget;
use app\components\ShrotWidget;
?>

<noscript>
    <div style="width:100%; text-align: center; margin:50px 0">
        <h1 style="color: red">Включите JavaScripts в настройках браузера!</h1>
    </div>
</noscript>
<?php $form = ActiveForm::begin() ?>
<div class="titan">
    <?php
    $_value = !empty($_POST['_value']) ? $_POST['_value'] : '';
    $_weight = !empty($_POST['_weight']) ? $_POST['_weight'] : '';
    $_month = !empty($_POST['_month']) ? $_POST['_month'] : '';
    ?>

    <form action="" method="post">

        <div id="start" class="start"></div>

        <div class=" col-md-4">
            <label for="inputState" class="form-label">Месяц</label>
            <select required name="_month" id="inputState" class="form-select" style="font-weight: 500; width: 200px;">
                <option selected value="">Выбрать...</option>
                <?php foreach ($catsMonth as $cat) {
                    echo '<option>' . $cat['month'] . '</option><br>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Тип сырья</label>
            <select required name="_value" id="_value" class="form-select" style="font-weight: 500; width: 200px;">
                <option selected value="">Выбрать...</option>
                <?php foreach ($type as $typ) {
                    echo '<option>' . $typ['title'] . '</option><br>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Тоннаж</label>
            <select required name="_weight" id="inputState" class="form-select" style="font-weight: 500; width: 200px;">
                <option selected value="">Выбрать...</option>
                <?php foreach ($catsWeight as $cat) {
                    echo '<option>' . $cat['weight'] . '</option><br>';
                }
                ?>
            </select>
        </div>

        <?php
        $_answer = '';
        if ($_value == 'соя') {
            foreach ($dataSoya as $dsoya) {
                if ($dsoya['month'] == $_month and $dsoya['weight'] == $_weight) {
                    $_answer = $dsoya['value'];
                }
            }
        } else {
            if ($_value == 'жмых') {
                foreach ($dataHmykh as $dh) {
                    if ($dh['month'] == $_month and $dh['weight'] == $_weight) {
                        $_answer = $dh['value'];
                    }
                }
            } else {
                if ($_value == 'шрот') {
                    foreach ($dataShrot as $dshrot) {
                        if ($dshrot['month'] == $_month and $dshrot['weight'] == $_weight) {
                            $_answer = $dshrot['value'];
                        }
                    }
                }
            }
        }

        ?>



        <button class="main-myButtonn">Посчитать</button>
        <div class="count">
            <div class="data">
                <p>Данные:</p>
                <span>Месяц:</span> <span class="value"><?php echo  $_month ?></span><br>
                <span>Тип сырья:</span> <span class="value"><?php echo  $_value ?></span><br>
                <span>Тоннаж:</span> <span class="value"><?php echo  $_weight ?></span><br>
                <p style="padding: 10px 0 0 0; display: inline">Ответ:</p>
                <span class="answer"><?php echo  $_answer
                                        ?></span>
            </div>
        </div>
    </form>



    <?php
    $_values = 1;
    if ($_value == 'жмых' or $_value == 'шрот' or $_value == 'соя') {
        $_values = 1;
    } else {
        $_values = 0;
    }
    ?>

    <div class="wrap-myMenu">
        <button onclick="scrollAction()" type="button" class="main-myButton">Таблица расчета</button>

        <div id="content" class="content">
            <div class="Bigcontent">
                <br>
                <?php
                if ($_value == 'жмых') {
                    echo HmykhWidget::widget();
                } else {
                    if ($_value == 'шрот') {
                        echo ShrotWidget::widget();
                    } else {
                        if ($_value == 'соя') {
                            echo SoyaWidget::widget();
                        } else {
                            echo  '<span>Ошибка! Выберите тип сырья.</span>';
                        }
                    }
                }
                ?>
            </div>

        </div>
    </div>


    <br>

    <script>
        $(() => {
            $(".main-myButton").click(() => {
                $(".content").slideToggle();
            });
        });
    </script>

    <script>
        var flag = 1;
        var value = '<?php echo $_values; ?>';

        function scrollAction() {
            if (flag == 1 && value != 0) {
                window.scrollTo(0, 1000);
                flag = 2;
            } else {
                if (flag == 2 && value != 0) {
                    window.scrollTo(0, -1000);
                    flag = 1;
                }
            }
        }
    </script>

    <?php //echo $_value 
    ?>
</div>
<?php ActiveForm::end() ?>