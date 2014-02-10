<?php
/**
 * Controller action representing the act of home page rendering on backend.
 *
 * Everything which should be done when user opens the backend landing page is here.
 *
 * @package YiiBoilerplate\Backend
 */
class ViewimageAction extends CAction
{
    /**
     * We render the homepage as a controller action here.
     */
    public function run()
    {
        $id=yii::app()->request->getQuery('id');

        if ($img=Images::model()->findByAttributes(array('id' => $id))) {
            //header('Content-type: image/jpg');
            if (!file_put_contents('backend/www/image.jpg', $img->img)) echo 'error';
            echo '<a href="/image.jpg">полное изображение</a>';
            //file_get_contents('www/images/image.jpg');
            //unlink ('/../../../image.jpg');
            //$img->destroy();
            Yii::app()->end();
             }

      
    }
} 