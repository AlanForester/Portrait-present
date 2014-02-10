<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => 'Title',
    'display' => null, // default is static to top
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => 'Карты', 'url' => '/site/cards'),
                array('label' => 'Заказы', 'url' => '/site/images'),
                array('label' => 'Пользователи', 'url' => '/site/users'),
                array('label' => 'Выход', 'url' => '/site/logout'),
            ),
        ),
    ),
)); ?>