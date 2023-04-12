<?php

use app\models\Hmykh;

$data = Hmykh::find()->all();
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

    <!-- <table class="table">
        <p style="font-size: 24px;">Таблица расчета "Жмых"</p>
        <thead>
            <tr>
                <td align="center"><strong> Вес</strong></td>
                <td align="center"> <strong>Месяц</strong> </td>
                <td align="center"><strong>Значение</strong> </td>
            </tr>
        </thead>
        <?php //foreach ($data as $value) {
        ?>
            <tr>
                <td align="center" valign="middle"><?php //echo $value['weight'];
                                                    ?></td>
                <td align="center" valign="middle"><?php //echo $value['month'];
                                                    ?></td>
                <td align="center" valign="middle"><?php //echo $value['value'];
                                                    ?></td>
            </tr>
        <?php //}
        ?>
    </table> -->
</div>