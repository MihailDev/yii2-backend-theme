<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
$layout = \mihaildev\backendTheme\Layout::createMain($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?= Html::csrfMetaTags() ?>
    <title><?= $layout->pageTitle ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition <?=$layout->params['default']['skin'];?> sidebar-collapse sidebar-mini">
<?php $this->beginBody() ?>
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">

        <?= Html::a('<span class="logo-mini"><i class="fa fa-home"></i></span><span class="logo-lg">' . $layout->appName . '</span>', $layout->homeUrl, ['class' => 'logo']) ?>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php echo $this->render($layout->getComponent()->getTemplate('main.block.navbar'), [
                        'layout' => $layout
                    ]);?>
                    <?php if($layout->params['mainSettings']['enable']){?>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </nav>
    </header>


    <?php echo $this->render($layout->getComponent()->getTemplate('main.block.sidebar'), [
        'layout' => $layout
    ]);?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?=$layout->contentTitle;?></h1>

            <?=
            \yii\widgets\Breadcrumbs::widget(
                [
                    'homeLink' => [
                        'label' => Yii::t('yii', 'Home'),
                        'url' => $layout->homeUrl,
                    ],
                    'links' => $layout->breadcrumbs,
                ]
            ) ?>

        </section>

        <!-- Main content -->
        <section class="content">
            <?= \mihaildev\backendTheme\widgets\Alert::widget($layout->alerts) ?>
            <?= $content ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php echo $this->render($layout->getComponent()->getTemplate('main.block.copyright'), [
        'layout' => $layout
    ]);?>

    <?php
    if($layout->params['mainSettingsEnable'])
        echo $this->render($layout->getComponent()->getTemplate('main.block.settings'), [
            'layout' => $layout
        ]);?>

</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
