<?php
/**
 * Controller action representing the act of home page rendering on backend.
 *
 * Everything which should be done when user opens the backend landing page is here.
 *
 * @package YiiBoilerplate\Backend
 */
class ViewimgAction extends CAction
{
    /**
     * We render the homepage as a controller action here.
     */
    public function run()
    {
        $id=yii::app()->request->getQuery('id');
        $im = new Imagick( __DIR__."/../../../media/images/".$id.".jpg" );
        header('Content-type: image/jpg');
        echo $im;
        $im->destroy();
        Yii::app()->end();
        }
} 