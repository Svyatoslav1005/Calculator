<?php

use app\models\Soya;
use app\models\Raw;


$data = Soya::find()->all();

$catsMonth = Soya::find()->where(['like', 'weight', '25'])->all();

$catsWeight = Soya::find()->where(['like', 'month', 'январь'])->all();

$query2 = 'select * from raw';

$type = Raw::findBySql($query2)->all();
?>



<div>
    <table>
        <tr>
            <th>Месяц</th>
            <th rowspan="2">январь</th>
            <th rowspan="2">февраль</th>
            <th rowspan="2">август</th>
            <th rowspan="2">сентябрь</th>
            <th rowspan="2">октябрь</th>
            <th rowspan="2">ноябрь</th>
        </tr>
        <tr>
            <th>Тоннаж</th>
        </tr>


        <tr>
            <td>25</td>
            <?php foreach ($data as $value) {
                if ($value['weight']  === '25 тонн') { ?>
                    <td><?php echo $value['value']; ?></td>
                <?php } ?>
            <?php } ?>
        </tr>

        <tr>
            <td>50</td>
            <?php foreach ($data as $value) {
                if ($value['weight']  === '50 тонн') { ?>
                    <td><?php echo $value['value']; ?></td>
                <?php } ?>
            <?php } ?>
        </tr>
        <tr>
            <td>75</td>
            <?php foreach ($data as $value) {
                if ($value['weight']  === '75 тонн') { ?>
                    <td><?php echo $value['value']; ?></td>
                <?php } ?>
            <?php } ?>
        </tr>
        <tr>
            <td>100</td>
            <?php foreach ($data as $value) {
                if ($value['weight']  === '100 тонн') { ?>
                    <td><?php echo $value['value']; ?></td>
                <?php } ?>
            <?php } ?>
        </tr>
    </table>
</div>