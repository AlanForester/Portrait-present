<?php
class BackendCardsAction extends CAction
{
    public $layout = "//layouts/main";
    public function run()
    {
        $criteria = new CDbCriteria();
        
        $dataProvider = new CActiveDataProvider("Cards",array('criteria' => $criteria));
        $this->controller->render('admin',array('dp' => $dataProvider));       
    }
} 