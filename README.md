Yii2 Backend Theme
===========================



## Установка

```json
"mihaildev/yii2-backend-theme": "*"
```

## Настройка

```php
'components' => [
    'backendTheme' => [
            'class' => 'mihaildev\backendTheme\Component',
            'homeUrl' => ['/backend/index'],
            'templates' =>
            [
                'main.block.navbar' => '@app/views/backend/block/navbar',
                'main.block.sidebar' => '@app/views/backend/block/sidebar',

                // default values
                //'main' => '@mihaildev/backendTheme/views/main',
                //'clear' =>'@mihaildev/backendTheme/views/clear',
                //'main.block.navbar' => '@mihaildev/backendTheme/views/block/navbar',
                //'main.block.copyright' => '@mihaildev/backendTheme/views/block/copyright',
                //'main.block.sidebar' => '@mihaildev/backendTheme/views/block/sidebar',
                //'main.block.settings' => '@mihaildev/backendTheme/views/block/settings',
            ],
            /*
            'params' =>
            [
                'default' => [
                    'skin' => 'skin-blue'
                ],
                'copyright' => [
                    'fromYear' => '',
                    'author' => 'MihailDev',
                    'url' => 'https://github.com/MihailDev'
                ],
                'mainSettings' => [
                    'enable' => true,
                ],
            ]
            */
        ],
    ],
```

## Использование

Отображения списка пользователей

```php
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

\mihaildev\backendTheme\Layout::createMain($this)
    ->setTitle('Users')
    ->setBreadcrumbs(['Users']);

?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        'email:email',

                        ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>
```

Авторизация

```php
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mihaildev\user\forms\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
```