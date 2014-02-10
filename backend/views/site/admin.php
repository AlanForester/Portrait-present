<div class="span3">
    

    <?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Добавление карт',
    'content' => '<p><input type="text" placeholder="количество карт" id="sum"></p>',
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
    <?php echo TbHtml::stackedTabs(array(
    array('label' => 'Добавить карту', 'url' => '/site/addcard',),
    array('label' => 'Добавить карты', 'url' => '/site/addcard', 'data-toggle' => 'modal', 'data-target' => '#myModal',),
    array('label' => 'Messages', 'url' => '#',),
)); ?>
    
</div>
<div class="span9">
<?php
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $dp,
    'template' => "{items}\n{pager}",
    'fixedHeader' => true,
    'responsiveTable' => true,
    'columns' => array(
        array('name' => 'id', 'header' => 'id'),
        array('name' => 'n_card', 'header' => 'Номер карты'),
        array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		/*'viewButtonUrl'=>null,
		'updateButtonUrl'=>null,*/
		'deleteButtonUrl'=>'Yii::app()->createUrl("/site/delcard",["id" => $data->id])',
	)
    )
));
var_dump(Yii::app()->user->role);
?>
</div>