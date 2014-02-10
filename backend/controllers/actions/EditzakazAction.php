<?php
/**
 * Controller action representing the act of home page rendering on backend.
 *
 * Everything which should be done when user opens the backend landing page is here.
 *
 * @package YiiBoilerplate\Backend
 */
class EditzakazAction extends CAction
{
    /**
     * We render the homepage as a controller action here.
     */
    public function run()
    {
        
       if (yii::app()->request->isPostRequest) {
           $id=yii::app()->request->getQuery('id');
            $painter_id=yii::app()->request->getQuery('painter_id');

             if ($img=Images::model()->findByAttributes(array('id' => $id))) {
                 $img->painter_id = $painter_id; 
                 $img->save;
             }
             else echo 'Такой карты не сущуствует';
       }
       else echo 'Ошибка доступа';
    }
} 