<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <link rel="stylesheet" href="../web/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<br>

<body>

    <div class="title">Калькулятор расчета стоимости поставки сырья</div>
    <?= $content ?>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>