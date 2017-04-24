<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;


?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">
    <div class="main_container">


        <!-- page content -->
        <div class="grid-view hide-resize">
          

            <?= $content ?>
        </div>
        <!-- /page content -->
    </div>
</div>

<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
