<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageController
 *
 * @author alex
 */
class ImageController extends FrontendController {
    
    public $layout = "//layouts/image";
    
    public function actionView($id) {
        
        $im = new Imagick( __DIR__."/../../media/images/".$id.".jpg" );
        header('Content-type: image/jpg');
        echo $im;
        $im->destroy();
        Yii::app()->end();
    }
}

?>
