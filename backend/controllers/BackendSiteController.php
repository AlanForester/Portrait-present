<?php

/**
 * Default controller for the backend entry point.
 *
 * For convenience we have all login-related stuff here, along with landing page, error page and static pages renderer.
 *
 * @package YiiBoilerplate\Backend
 */
class BackendSiteController extends BackendController {

    public $layout = "//layouts/main";

    /**
     * The actions defined in separate action classes and bound to this class by IDs.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#actions-detail
     *
     * @return array
     */
    public function actions() {
        return [
            'captcha' => [
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'foreColor' => 0x0099CC,
            ],
            'page' => 'CViewAction',
            'error' => 'SimpleErrorAction',
            'login' => 'PasswordLoginAction',
            'logout' => 'LogoutAction',
            'index' => 'BackendHomePageAction',
            'cards' => 'BackendCardsAction',
            'admin' => 'AdminAction',
            'addcard' => 'AddcardAction',
            'addcards' => 'AddcardsAction',
            'delcard' => 'DelcardAction',
            'viewzakaz' => 'ViewzakazAction',
            'images' => 'BackendImagesAction',
            'users' => 'BackendUsersAction',
            'updatezakaz' => 'BackendUpdatezakazAction',
            'viewimg' => 'ViewimgAction',            
            'viewimage' => 'ViewimageAction',
            'editzakaz' => 'EditzakazAction',
            'toggle' => array(
                'class' => 'yiiwheels.widgets.toggle.WhToggleAction',
                'modelName' => 'Users',
            )
        ];
    }

    /**
     * Rules for CAccessControlFilter.
     *
     * We enable the registration and other basic pages for guest users.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
     *
     * @return array Rules for the "accessControl" filter.
     */
    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => ['login'],
                'users' => ['?']
            ),
            array(
                'allow',
                'actions' => ['index','logout'],
                'users' => ['@'],
            ),
            array(
                'deny',
                'actions' => ['admin',],
                'users' => ['*']
            ),
            array(
                'allow',
                'actions' => ['admin', 'cards', 'addcard', 'delcard', 'images', 'addcards', 'users', 'updatezakaz', 'viewimg', 'viewimage', 'editzakaz'],
                'roles' => ['administrator']
            ),
            array('deny'),
        );
    }

    /* public function filters() {
      return array(
      'accessControl',
      //array('bootstrap.filters.BootstrapFilter - delete'),
      /* 'toggle' => array(
      'class'=>'yiiwheels.widgets.toggle.WhToggleAction',
      'modelName' => 'Users',
      ), */
    /*     );
      } */
}
