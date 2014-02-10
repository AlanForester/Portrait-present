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
    <?php Yii::app()->clientScript->registerCssFile("css/backend.css");?>
</head>

<body>
<!-- NAVIGATION BEGIN -->
<?php //$this->renderPartial('//layouts/_navigation');?>
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
