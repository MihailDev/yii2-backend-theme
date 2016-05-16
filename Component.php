<?php
/**
 * Date: 24.01.2016
 * Time: 12:44
 */

namespace mihaildev\backendTheme;


use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;

/**
 * @property mixed homeUrl
 * @property mixed appName
 */
class Component extends \yii\base\Component
{
    public $templates = [];

    public $params = [];

    public function init(){
        parent::init();

        $this->templates = ArrayHelper::merge([
            'main' => '@mihaildev/backendTheme/views/main',
            'clear' =>'@mihaildev/backendTheme/views/clear',
            'main.block.navbar' => '@mihaildev/backendTheme/views/block/navbar',
            'main.block.copyright' => '@mihaildev/backendTheme/views/block/copyright',
            'main.block.sidebar' => '@mihaildev/backendTheme/views/block/sidebar',
            'main.block.settings' => '@mihaildev/backendTheme/views/block/settings',
        ], $this->templates);

        $this->params = ArrayHelper::merge([
            'default' => [
                'skin' => 'skin-blue'
            ],
            'copyright' => [
                'fromYear' => '',
                'author' => 'MihailDev',
                'url' => 'https://github.com/MihailDev'
            ],
            'mainSettingsEnable' => true
        ], $this->params);
    }

    public function getTemplate($id){
        if(!isset($this->templates[$id]))
            throw new InvalidParamException('Шаблон с идентификатором "'.$id.'" не найдена.');

        return $this->templates[$id];
    }


    public function initLayout($id){
        \Yii::$app->controller->layout = $this->getTemplate($id);
    }

    protected $_appName;
    public function setAppName($v){
        $this->_appName = $v;
    }

    public function getAppName(){
        if(empty($this->_appName))
            $this->_appName = \Yii::$app->name;

        return $this->_appName;
    }

    protected $_homeUrl = [];
    public function setHomeUrl($v){
        $this->_homeUrl = $v;
    }

    public function getHomeUrl(){
        if(empty($this->_homeUrl))
            $this->_homeUrl = \Yii::$app->homeUrl;

        return $this->_homeUrl;
    }
}