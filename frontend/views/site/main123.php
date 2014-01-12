    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => 'Title',
    'display' => null, // default is static to top
    'items' => array(
    array(
    'class' => 'bootstrap.widgets.TbNav',
    'items' => array(
    array('label' => 'Home', 'url' => '#', 'active' => true),
    array('label' => 'Link', 'url' => '#'),
    array('label' => 'Link', 'url' => '#'),
    ),
    ),
    ),
    )); ?>