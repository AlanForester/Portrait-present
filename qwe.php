<?php

/**
 *
 * main.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
    'preload' => array('log'),
    'aliases' => array(
        'frontend' => dirname(__FILE__) . '/../..' . '/frontend',
        'common' => dirname(__FILE__) . '/../..' . '/common',
        'backend' => dirname(__FILE__) . '/../..' . '/backend',
        'vendor' => dirname(__FILE__) . '/../..' . '/common/lib/vendor'
    ),
    'import' => array(
        'common.extensions.components.*',
        'common.components.*',
        'common.helpers.*',
        'common.models.*',
        'application.controllers.*',
        'application.extensions.*',
        'application.helpers.*',
        'application.models.*'
    ),
    'components' => array(
        'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=pp',
			'username' => 'pp',
			'password' => '842655',
			'enableProfiling' => true,
			'enableParamLogging' => true,
			'charset' => 'utf8',
		),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    //'class'        => 'CDbLogRoute',
                    //'connectionID' => 'db',
                    'class' => 'CWebLogRoute',
                    'levels'       => 'error, warning',

                    'filter'=>'CLogFilter',
                ),
            ),
        ),
    ),
    'params' => array(
        // php configuration
        'php.defaultCharset' => 'utf-8',
        'php.timezone' => 'UTC',
    )
);

<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends EController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}