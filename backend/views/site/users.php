
<?php $sel=TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_HORIZONTAL); ?>
    <?php $sel.=TbHtml::emailFieldControlGroup('email', '',
        array('label' => 'Email', 'placeholder' => 'Email')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Пароль', 'placeholder' => 'Пароль')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Фамилия', 'placeholder' => 'Фамилия')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Имя', 'placeholder' => 'Имя')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Отчество', 'placeholder' => 'Отчество')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Пароль', 'placeholder' => 'Пароль')); ?>
    <?php $sel.=TbHtml::textFieldControlGroup('text', '',
        array('label' => 'Телефон', 'placeholder' => 'Телефон')); ?>
    <?php $sel.=TbHtml::dropDownListControlGroup('dropDown', '', array('администратор', 'художник', 'пользователь'), array('label' => 'Роль')); ?>
    <?php $sel.=TbHtml::endForm(); ?>



<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Добавление пользователя',
    'content' => '<p>'
     . $sel
     . '</p>',
    'footer' => array(
        TbHtml::ajaxButton('Добавить', Yii::app()->createUrl('/site/addcard'), array(
            'type' => 'post',
            'data-dismiss' => 'modal',
            'data' => array(
                
                'sum' => new CJavaScriptExpression('function(){return $("#sum").val();}'),
            ),
            'htmlOptions'=>array('data-dismiss'=>'modal'),
            
                  'success'=>'function (data) {$("#sum").val(""); $("myModal").css({"display": "none"});  $("#myModal").css({"display": "none"}); $("#myModal").removeClass("in"); $("#myModal").prop("aria-hidden", "true"); $(".modal-backdrop").css({"display": "none"});}'
     
                ), array(
            'color' => TbHtml::BUTTON_COLOR_WARNING, 'style' => '')),
        TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'type'=>'primary', 'color' => TbHtml::BUTTON_COLOR_PRIMARY,'url'=>'/site/addcard')),
        TbHtml::button('Закрыть', array('data-dismiss' => 'modal')),
     ),
)); ?>




<div class="span3">
<?php echo TbHtml::stackedTabs(array(
    array('label' => 'Добавить пользователя', 'url' => '/site/adduser', 'data-toggle' => 'modal', 'data-target' => '#myModal',),
    
)); ?>
</div>
<div class="span9">
<?php
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $dp,
    'template' => "{items}",
    'fixedHeader' => true,
    'responsiveTable' => true,
    'columns' => array(
        array('name' => 'id', 'header' => 'id'),        
        array('name' => 'email', 'header' => 'email'),
        array('name' => 'phone', 'header' => 'телефон'),
        array('name' => 'role0.role', 'header' => 'роль'), 
        array('name' => 'family', 'header' => 'фамилия'),
        array('name' => 'name', 'header' => 'имя'),
        array('name' => 'ot4estvo', 'header' => 'отчество'),
        array(
		'htmlOptions' => array('nowrap'=>'nowrap','data-target'=>'#myModal', 'data-toggle'=>'modal'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl'=>'Yii::app()->createUrl("/site/addcard",["id" => $data->id])',
		'updateButtonUrl'=>null,
		'deleteButtonUrl'=>null,
	)
    )
));

var_dump(Yii::app()->user->role);
?>
</div>