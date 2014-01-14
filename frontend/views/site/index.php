<div class="item size33" style="color: rgb(255, 255, 255); background-color: rgb(237, 32, 36);"><div class="cover">
        <table border="0" width="100%" cellspacing="10" style="border-spacing: 10px;"><tbody><tr><td colspan="2">
<h2>Активировать карту</h2>
<p>Вы держите в руках будущее произведение искусства – ПОРТРЕТ ПО ФОТОГРАФИИ* Ваш или дорогого Вам человека, выполненный на холсте маслом или карандашом профессиональным художником!</p></td></tr>
<tr><td><?php echo CHtml::image('img/cart_blanc.png','карты предопалаты');?></td>
<td>
<table border="0" width="100%">
<tbody><tr><td class="digitList">1</td><td>Вскройте упаковку по перфорации</td></tr><tr>
</tr><tr><td class="digitList">2</td><td>Достаньте карту, сотрите защитный слой на оборотной стороне</td></tr><tr>
</tr><tr><td class="digitList">3</td><td>Активируйте карту, введя код под защитным слоем</td></tr><tr>
</tr></tbody></table>
</td></tr>
<tr><td colspan="2">
<form id="VerifyCode"><div id="InsertCode"><table border="0" width="100%" cellspacing="10">
<tbody><tr><td colspan="3"><input class="CodeMascAdd REDField" id="ncard" name="code" type="text" size="16" value=""></td></tr>
    <tr><td>E-Mail:</td><td><input type="text" size="16" id="email" value="" class="REDField" name="email"></td><td>
            <?php echo TbHtml::ajaxButton('отправить данные', Yii::app()->createUrl('/site/cardform'), array(
    'type'=>'post',
    
    'data'=>array(
        'ncard'=>new CJavaScriptExpression('function(){return $("#ncard").val();}'), 
        'email'=>new CJavaScriptExpression('function(){return $("#email").val();}')
        ),
    'success'=>'function (data){ $("#CeateContent").html(data)}'
    ), array(
        'color' => TbHtml::BUTTON_COLOR_WARNING,'style'=>'margin-top: -7px;'));?></td></tr></tbody></table></div>
<input type="hidden" name="content" value="ajax_fw">
<input type="hidden" name="action" value="VerifyCode">


</form></td></tr></tbody></table></div></div>
<div class="item size33" style="color: rgb(0, 0, 0); background-color: rgb(255, 231, 23);"><div class="cover"><div id="CeateContent">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody><tr><td>
            <?php echo CHtml::image('img/portrairt.png','Портрет',array("title"=>"Портрет", "width"=>"100%"));?></td></tr>
<tr><td>
<h2>ХОТИТЕ УГАДАТЬ С ПОДАРКОМ?</h2>
</td></tr></tbody></table>
</div></div></div>
<div class="item size32" style="color: rgb(255, 255, 255); background-color: rgb(255, 205, 5);"><div class="cover"><?php echo CHtml::image('img/pixel_trans.gif','',array("width"=>"100%", "style"=>"height:100px"));?><h2>Наши работы</h2>
<p>Мы работаем только с профессионалами с большой буквы! Вы можете быть уверены, что работа будет выполнена качественно и в срок!</p></div></div>
<div class="item size32" style="color: rgb(255, 255, 255); background-color: rgb(237, 89, 34);"><div class="cover"><?php echo CHtml::image('img/pixel_trans.gif','',array("width"=>"100%", "style"=>"height:100px"));?><h2>Наши мастера</h2>
<p>Мы работаем только с профессионалами с большой буквы! Вы можете быть уверены, что работа будет выполнена качественно и в срок!</p></div></div>
<div class="item size32" style="color: rgb(255, 255, 255); background-color: rgb(98, 77, 160);"><div class="cover"><?php echo CHtml::image('img/pixel_trans.gif','',array("width"=>"100%", "style"=>"height:100px"));?><h2>Как рождается портрет</h2>
<?php echo CHtml::image('img/pixel_trans.gif','',array("width"=>"100%", "style"=>"height:30px"));?><p><input type="button" value="СМОТРЕТЬ ВИДЕО"></p></div></div>
<div class="item size32 flFon"><div class="cover"><h2>Портрет по фотографии</h2>
<?php echo CHtml::image('img/polosa_rb.png','Портрет',array("width"=>"100%"));?><ul class="HeadList">
<li>СЕГОДНЯ доставит удовольствие
</li><li>ЗАВТРА не будет передарен
</li><li>ВСЕГДА будет в центре внимания
</li></ul></div></div>
<div class="item size21" style="color: rgb(255, 255, 255); background-color: rgb(8, 153, 72);"><div class="cover"><h2>Гарантия</h2>
<p>Гарантированный результат! Готовый портрет мы доставляем только после утверждения эскиза по e-mail.</p></div></div>
<div class="item size11" style="color: rgb(255, 255, 255); background-color: rgb(46, 103, 178);"><div class="cover"><h2>Следуй</h2>
<p>ВКонтакте</p>
<p>Фейсбук</p>
<p>YouTube</p></div></div>
