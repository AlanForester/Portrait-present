<?php
/**
 * @var BackendSiteController $this
 */
//$this->pageTitle=Yii::app()->name; ?>

<?//=$user?>
<div class="container"> 
<div class="row">

<div class="span6 offset2 well top200">
    
<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_HORIZONTAL); ?>
    <?php echo TbHtml::emailFieldControlGroup('email', '',
        array('label' => 'Email', 'placeholder' => 'Email')); ?>
    <?php echo TbHtml::passwordFieldControlGroup('password', '',
        array('label' => 'Password', 'placeholder' => 'Password')); ?>
    <?php echo TbHtml::checkBoxControlGroup('rememberMe', false, array(
        'label' => 'Remember me',
        'controlOptions' => array('after' => TbHtml::submitButton('Sign in')),
    )); ?>
<?php echo TbHtml::endForm(); ?>    
    
</div>



</div>