    <?php
    $this->widget(
    'yiiwheels.widgets.highcharts.WhHighCharts',
    array(
    'pluginOptions' => array(
    'title' => array('text' => 'Fruit Consumption'),
    'xAxis' => array(
    'categories' => array('Apples', 'Bananas', 'Oranges')
    ),
    'yAxis' => array(
    'title' => array('text' => 'Fruit eaten')
    ),
    'series' => array(
    array('name' => 'Jane', 'data' => array(1, 0, 4)),
    array('name' => 'John', 'data' => array(5, 7, 3))
    )
    ) 
    ) 
    ); 
    ?>