<?php
/**
 * Controller action representing the act of home page rendering on backend.
 *
 * Everything which should be done when user opens the backend landing page is here.
 *
 * @package YiiBoilerplate\Backend
 */
class DelcardAction extends CAction
{
    /**
     * We render the homepage as a controller action here.
     */
    public function run()
    {
        
       if (yii::app()->request->isPostRequest) {
            $id=yii::app()->request->getQuery('id');

             if ($cards=Cards::model()->findByAttributes(array('id' => $id))) {
                     $cards->delete();
             }
             else echo 'Такой карты не сущуствует';
       }
       else echo 'Ошибка доступа';
    }
} 