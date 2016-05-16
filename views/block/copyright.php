<?php
/** @var $this \yii\web\View */
/* @var $layout \mihaildev\backendTheme\Layout */
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> <?=Yii::$app->version;?>
    </div>
    <?php if(!empty($layout->params['copyright']['author'])){?>

    <strong>Copyright &copy; <?=(empty($layout->params['copyright']['fromYear'])) ? '' : $layout->params['copyright']['fromYear']." - ";?><?=date('Y');?>

        <?=(!empty($layout->params['copyright']['url'])) ? \yii\helpers\Html::a($layout->params['copyright']['author'], $layout->params['copyright']['url']) : $layout->params['copyright']['author'];?>.</strong> All rights reserved.
    <?php } else {?>
        &nbsp;
    <?php }?>
</footer>