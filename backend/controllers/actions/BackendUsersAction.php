<?php
class BackendUsersAction extends CAction
{
    public $layout = "//layouts/main";
    public function run()
    {
      $criteria = new CDbCriteria;


        
        $dataProvider = new CActiveDataProvider("Users",array('criteria' => $criteria));
       
       // print_r($dataProvider);die;
        $this->controller->render('users',array('dp' => $dataProvider));       
    }
} 