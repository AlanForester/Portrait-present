

<div class="span3">
    <?php echo TbHtml::stackedTabs(array(
        array('label' => 'Добавить карту', 'url' => '#',),
        array('label' => 'Profile', 'url' => '#',),
        array('label' => 'Messages', 'url' => '#',),
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
            array('name' => 'typek0.typek', 'header' => 'тип картины'),
            array('name' => 'activ.user.email', 'header' => 'email пользователя'), 
            array('name' => 'options_delivery', 'header' => 'доставка'),
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'updateButtonOptions'=>array('nowrap'=>'nowrap','data-target'=>'#myModal', 'data-toggle'=>'modal'),
                'viewButtonUrl'=>'"javascript:viewModal(".$data->id.")"',
                'updateButtonUrl'=>'#',
                'deleteButtonUrl'=>null,
            )
        )
    ));

    var_dump(Yii::app()->user->role);
    ?>
</div>