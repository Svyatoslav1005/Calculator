<?php

use app\models\Soya;
use app\models\Raw;

?>
<link rel="stylesheet" href="../web/css/style.css">
<?php

$data = Soya::find()->all();

$catsMonth = Soya::find()->where(['like', 'weight', '25'])->all();

$catsWeight = Soya::find()->where(['like', 'month', 'январь'])->all();

$query2 = 'select * from raw';

$type = Raw::findBySql($query2)->all();
?>



<div>
    <table class="table">
        <p style="font-size: 24px;">Таблица расчета "Соя"</p>
        <thead>
            <tr>
                <td align="center"><strong> Вес</strong></td>
                <td align="center"> <strong>Месяц</strong> </td>
                <td align="center"><strong>Значение</strong> </td>
            </tr>
        </thead>
        <?php foreach ($data as $value) {
        ?>
            <tr>
                <td align="center" valign="middle"><?php echo $value['weight'];
                                                    ?></td>
                <td align="center" valign="middle"><?php echo $value['month'];
                                                    ?></td>
                <td align="center" valign="middle"><?php echo $value['value'];
                                                    ?></td>
            </tr>
        <?php }
        ?>
    </table>
</div>