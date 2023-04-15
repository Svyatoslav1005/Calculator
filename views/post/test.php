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

        <div class="block1" id="block1">

            <div class="suka">
                <select onclick="this.className = (this.className == 'choices' ? 'secondchoices' : 'choices')" class="choices" name="month" id="inputState">

                    <option class="open" value="" <?php if (!empty($_POST['month']) and $_POST['month'] === "") {
                                                        echo 'selected';
                                                    } ?>hidden>Месяц</option>
                    <?php foreach ($month as $monthId => $monthValue) : ?>
                        <option value="<?= $monthId ?>" <?php if (!empty($_POST['month']) and $_POST['month'] === $monthId) {
                                                            echo 'selected';
                                                        } ?>>
                            <?= $monthValue ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div>
                <select onclick="this.className = (this.className == 'choices' ? 'secondchoices' : 'choices')" class="choices" required name="type" id="inputState">

                    <option class="open" value="" <?php if (!empty($_POST['type']) and $_POST['type'] === "") {
                                                        echo 'selected';
                                                    } ?> hidden>Тип сырья</option>
                    <?php foreach ($type as $typeId => $typeValue) : ?>
                        <option value="<?= $typeId ?>" <?php if (!empty($_POST['type']) and $_POST['type'] === $typeId) {
                                                            echo 'selected';
                                                        } ?>> <?= $typeValue ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div>
                <select onclick="this.className = (this.className == 'choices' ? 'secondchoices' : 'choices')" class="choices" required name="weight" id="inputState">

                    <option class="open" value="" <?php if (!empty($_POST['weight']) and $_POST['weight'] === "") {
                                                        echo 'selected';
                                                    } ?> hidden>Тоннаж</option>
                    <?php foreach ($weight as $weightId => $weightValue) : ?>
                        <option value="<?= $weightId ?>" <?php if (!empty($_POST['weight']) and $_POST['weight'] === $weightId) {
                                                                echo 'selected';
                                                            } ?>> <?= $weightValue ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="myButtonn">Посчитать</button>
        </div>
    </form>

    <div class="block2">
        <div class="count">
            <p>Данные:</p>
            <div><span style="color: #1e083bbe;">Месяц:</span> <span class="value"><?= $datamonth
                                                                                    ?></span></div>
            <div><span style="color: #1e083bbe;">Тип сырья:</span> <span class="value"><?= $datatype
                                                                                        ?></span></div>
            <div><span style="color: #1e083bbe;">Тоннаж:</span> <span class="value"><?= $dataweigh
                                                                                    ?></span></div>
            <p style="padding: 10px 0 0 0; display: inline">Стоимость:</p>
            <span class="answer"><?= $answer ?></span>
        </div>
        <button type="button" class="myButton">Таблица расчета</button>
    </div>
    <div id="content" class="content">
        <div class="Bigcontent">
            <br>
            <?= $content ?>
        </div>

    </div>
</div>

<?php ActiveForm::end() ?>