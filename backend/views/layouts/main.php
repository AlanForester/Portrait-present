<?php
/**
* Main layout file for the whole backend.
* It is based on Twitter Bootstrap classes inside HTML5Boilerplate.
*
* @var BackendController $this
* @var string $content
*/
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?= CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->clientScript->registerCssFile("css/backend.css");
        $viewModal = " 
        function viewModal(id) { " .
        CHtml::ajax(array(
            'url' => '/site/updatezakaz',
            'data' => array(
                'id' => new CJavaScriptExpression("id"),

            ),
            'type' => 'POST',
            'success' => "function(data) { $('#modal').html(data); } ",
        ))
        . " }";
        Yii::app()->clientScript->registerScript("viewModal",$viewModal,CClientScript::POS_HEAD);
        ?>
    </head>

    <body>
        <!-- NAVIGATION BEGIN -->
        <?php 
        if (Yii::app()->user->checkaccess("administrator")) {
            $this->renderPartial('//layouts/_navigation');
        }
        ?>
        <!-- NAVIGATION END -->

        <!-- CONTENT WRAPPER BEGIN -->
        <div class="container">


            <div class="row">

                <!-- CONTENT BEGIN -->
                <?= $content; ?>
                <!-- CONTENT END -->

            </div>

            <div class="row">
                <hr/>
                <footer>

                </footer>
            </div>

        </div>
        <!-- CONTENT WRAPPER END -->

    </body>
</html>
