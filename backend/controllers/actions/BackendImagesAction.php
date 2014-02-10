<?php
class BackendImagesAction extends CAction
{
    public $layout = "//layouts/main";
    public function run()
    {
      $criteria = new CDbCriteria;


        
        $dataProvider = new CActiveDataProvider("Images",array('criteria' => $criteria));
       
       // print_r($dataProvider);die;
        $this->controller->render('images',array('dp' => $dataProvider));       
    }
} 