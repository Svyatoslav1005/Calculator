<?php

use app\models\Raw;
use app\models\Shrot;


?>
<link rel="stylesheet" href="../web/css/style.css">
<?php

$data = Shrot::find()->all();

$catsMonth = Shrot::find()->where(['like', 'weight', '25'])->all();

$catsWeight = Shrot::find()->where(['like', 'month', 'январь'])->all();

$query2 = 'select * from raw';

$type = Raw::findBySql($query2)->all();
?>
<div>
    <table class="table">
        <p style="font-size: 24px;">Таблица расчета "Шрот"</p>
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