<?php

use yii\widgets\ActiveForm;
?>

<noscript>
    <div style="width:100%; text-align: center; margin:50px 0">
        <h1 style="color: red">Включите JavaScripts в настройках браузера!</h1>
    </div>
</noscript>
<?php $form = ActiveForm::begin() ?>
<div class="titan">

    <form action="" method="post">

        <div id="start" class="start"></div>

        <div class="block1">

            <div>
                <select class="choices" required name="month" id="inputState">
                    <option class="open" value="" hidden selected>Месяц</option>
                    <?php foreach ($month as $typeId) : ?>
                        <option><?php echo $typeId['month'] ?></option><br>
                    <?php endforeach; ?>
                </select>
            </div>


            <div>
                <select class="choices" required name="value" id="inputState">
                    <option class="open" value="" hidden disabled selected>Тип сырья</option>
                    <?php foreach ($type as $typeId) : ?>
                        <option><?php echo $typeId['title'] ?></option><br>
                    <?php endforeach; ?>
                </select>
            </div>


            <div>
                <select class="choices" required name="weight" id="inputState">
                    <option class="open" value="" hidden disabled selected>Тоннаж</option>
                    <?php foreach ($weight as $typeId) : ?>
                        <option><?php echo $typeId['weight'] ?></option><br>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="myButtonn">Посчитать</button>
        </div>
    </form>

    <div class="block2">
        <div class="count">
            <p>Данные:</p>
            <span style="color: #1e083bbe;">Месяц:</span> <span class="value"><?php echo  $postmonth ?></span><br>
            <span style="color: #1e083bbe;">Тип сырья:</span> <span class="value"><?php echo  $postvalue ?></span><br>
            <span style="color: #1e083bbe;">Тоннаж:</span> <span class="value"><?php echo  $postweight ?></span><br>
            <p style="padding: 10px 0 0 0; display: inline">Стоимость:</p>
            <span class="answer"><?php echo  $answer ?></span>
        </div>
        <button onclick="scrollAction()" type="button" class="myButton">Таблица расчета</button>
    </div>
    <div id="content" class="content">
        <div class="Bigcontent">
            <br>
            <?php echo $content ?>
        </div>

    </div>
</div>

<?php ActiveForm::end() ?>