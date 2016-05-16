<?php
/**
 * Date: 24.01.2016
 * Time: 17:04
 */

namespace mihaildev\backendTheme;


use yii\base\Object;
use yii\base\View;

/**
 * @property string pageTitle
 * @property string contentTitle
 * @property array breadcrumbs
 * @property array alerts
 * @property string appName
 * @property string|array homeUrl
 * @property string title
 * @property string smallTitle
 * @property array params
 */
class Layout extends Object
{
    /**
     * @return Component
     * @throws \yii\base\InvalidConfigException
     */
    public static function getComponent(){
        return \Yii::$app->get('backendTheme');
    }

    /**
     * @param View $view
     * @param string $layoutID
     * @param bool $reset
     * @return Layout
     * @throws \yii\base\InvalidConfigException
     */
    public static function create($view, $layoutID, $reset = false){
        if(!isset($view->params['_backendThemeLayout']) || $reset){
            $view->params['_backendThemeLayout'] = \Yii::createObject(static::className());
            static::getComponent()->initLayout($layoutID);
        }


        return $view->params['_backendThemeLayout'];
    }

    public static function createMain($view, $reset = false){
        return static::create($view, 'main', $reset);
    }

    public static function createClear($view, $reset = false){
        return static::create($view, 'clear', $reset);
    }

    protected $_pageTitle;
    public function setPageTitle($v){
        $this->_pageTitle = $v;

        return $this;
    }

    public function getPageTitle(){
        if(empty($this->_pageTitle)){
            $this->_pageTitle = $this->title . ((!empty($this->smallTitle)) ? ' :: ' . $this->smallTitle . ' - ' : ' - ') . $this->appName;
        }
        return $this->_pageTitle;
    }

    protected $_contentTitle;
    public function setContentTitle($v){
        $this->_contentTitle = $v;

        return $this;
    }

    public function getContentTitle(){
        if(empty($this->_contentTitle)){
            $this->_contentTitle = $this->title . ((!empty($this->smallTitle)) ? '<small>' . $this->smallTitle . '</small>' : '');
        }

        return $this->_contentTitle;
    }

    protected $_title;
    public function setTitle($v){
        $this->_title = $v;

        return $this;
    }

    public function getTitle(){
        if($this->_title === null){

            $this->_title =  ucwords(\Yii::$app->controller->id . ' ' . \Yii::$app->controller->action->id);

            $this->_smallTitle = (\Yii::$app->controller->module !== \Yii::$app) ? ucwords(\Yii::$app->controller->module->id) : '';
        }

        return $this->_title;
    }

    protected $_smallTitle;
    public function setSmallTitle($v){
        $this->_smallTitle = $v;

        return $this;
    }

    public function getSmallTitle(){
        if($this->_smallTitle === null)
            $this->_smallTitle = '';

        return $this->_smallTitle;
    }

    public function getHomeUrl(){
        return $this->getComponent()->homeUrl;
    }

    public function getAppName(){
        return $this->getComponent()->appName;
    }

    protected $_alerts = [];
    public function setAlerts($v){
        $this->_alerts = $v;

        return $this;
    }

    public function getAlerts(){
        return $this->_alerts;
    }


    protected $_breadcrumbs = [];
    public function setBreadcrumbs($v){
        $this->_breadcrumbs = $v;

        return $this;
    }

    public function getBreadcrumbs(){
        return $this->_breadcrumbs;
    }

    public function getParams(){
        return $this->getComponent()->params;
    }

}