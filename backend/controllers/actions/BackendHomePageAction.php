<?php
/**
 * Controller action representing the act of home page rendering on backend.
 *
 * Everything which should be done when user opens the backend landing page is here.
 *
 * @package YiiBoilerplate\Backend
 */
class BackendHomePageAction extends CAction
{
    /**
     * We render the homepage as a controller action here.
     */
    public function run()
    {
       if (Yii::app()->user->checkaccess("administrator")) {
           $this->controller->render('admin');
           
           
       }
       else {/*
       $username=yii::app()->request->getPost('email');
       $password='';
       //echo md5($password).'ggg';
       $identity=new UserIdentity($username,$password);
            if($identity->authenticate())
            {
                Yii::app()->user->login($identity);
                
            
            }
            else
                echo $identity->errorCode;*/
        /* 
        $email=yii::app()->request->getPost('email');
	$this->render('index', array('user'=>$email), false, true);*/  
        /*$this->controller->render('index');*/
       }
    }
} 