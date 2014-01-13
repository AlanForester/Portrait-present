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
class SiteController extends FrontendController
{
    public $layout = "//layouts/main";
    
	public function actionIndex()
	{
		$this->render('index');
                
	}
        public function actionMain()
	{
            $this->layout = "//layouts/main000";
		$this->render('main123');
                
	}
        
        public function actionCardform()
        {
            if ((yii::app()->request->isAjaxRequest)&&(yii::app()->request->isPostRequest)) {
                $email=yii::app()->request->getPost('email');
                $ncard=yii::app()->request->getPost('ncard');
                if ($email&&$ncard){
                    echo $email.' '.$ncard;
                    
                }
            }
            yii::app()->end();
             
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