<form id="FinolCheck" method="post"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="productListing">
        <tbody><tr>
                <td align="center" class="ProdEntity" width="100%" valign="top" colspan="2">

                    <div class="photoTovar" id="divh1" style="display: none;">
                        <a class="fancybox" data-fancybox-group="gallery" href="http://www.portrait-present.ru/images/dscn1487.jpg">
                            <img border="0" alt="Карикатура" title="Карикатура" height="225" width="326" src="img/images_dscn1386_225.jpg" class="UserPhotoLoad">
                        </a>
                        <br>
                    </div>
                    <div class="ViborProd ColorVibor" id="but1">Карикатура<br>&nbsp;2,000 руб.&nbsp; 
                        <input type="radio" name="ProductID" class="SelProductID" value="1" checked="checked">
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" class="ProdEntity" width="100%" valign="top" colspan="2">
                    <div class="photoTovar hiddenBox" id="divh2" style="display: none;">
                        <a class="fancybox" data-fancybox-group="gallery" href="http://www.portrait-present.ru/images/dscn1386.jpg">
                            <img border="0" alt="Портрет карандашом" title="Портрет карандашом" height="225" width="326" src="img/images_dscn1386_225.jpg" class="UserPhotoLoad">
                        </a><br>
                    </div>
                    <div class="ViborProd ColorVibor" id="but2">Портрет карандашом<br>&nbsp;2,000 руб.&nbsp; 
                        <input type="radio" name="ProductID" class="SelProductID" value="2"></div>
                </td>
            </tr>
            <tr>
                <td align="center" class="ProdEntity" width="100%" valign="top" colspan="2">
                    <div class="photoTovar hiddenBox" id="divh3" style="display: block;">
                        <a class="fancybox" data-fancybox-group="gallery" href="http://www.portrait-present.ru/images/dsc06355.jpg">
                            <img border="0" alt="Портрет маслом" title="Портрет маслом" height="225" width="326" src="img/images_dscn1386_225.jpg" class="UserPhotoLoad">
                        </a><br>
                    </div>
                    <div class="ViborProd ColorViborCur" id="but3">Портрет маслом<br>&nbsp;2,000 руб.&nbsp; 
                        <input type="radio" name="ProductID" class="SelProductID" value="3" checked="checked"></div></td>
            </tr>
            <tr>
                <td align="center" class="ProdEntity" width="100%" valign="top">
                <?php
$this->widget('yiiwheels.widgets.fineuploader.WhFineUploader', array(
    'name' => 'fineuploadtest',
    'uploadAction' => $this->createUrl('site/images', array('fine' => 1,
        'user' => $user,
        'card_id' => $card_id,
    )),
    'pluginOptions' => array(
        'validation' => array(
            'allowedExtensions' => array('jpeg', 'jpg', 'png', 'bmp'),
        ),
    ),
    //'htmlOptions' => array(
    //    'class' => 'btn',
    //),
    'events' => array(
        'complete' => "function(data) { " .
        CHtml::ajax(array(
            'url' => 'site/zakaz',
            'data' => array(
                'typek' => new CJavaScriptExpression("function(){return $('#typek').text();}"),
                'user' => $user,
                'card_id' => $card_id,
            ),
            'type' => 'POST',
            'success' => "function(data) { $('#modal').html(data); } ",
        ))
        . " }",
    ),
));
?> 
  </td><td>                  
                    
                    <?php
echo TbHtml::button('Заказать', array(
    'style' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_LARGE,
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
));
?>
                </td>
            </tr>
        </tbody></table>
</form>
<div style="display: none;" id="typek">maslo</div>


<?php
$this->widget('yiiwheels.widgets.modal.WhModal', array(
    'id' => 'myModal',
    'header' => 'Оформление заказа',
    'backdrop' => false,
    'content' => '<div id="modal">Ошибка</div>',
    'htmlOptions' => ['style' => 'width: 800px; margin-left: -400px'],
    'footer' => implode(' ', array(
        TbHtml::ajaxButton('Оформить заказ', Yii::app()->createUrl('/site/zakazend'), array(
            'type' => 'post',
            'data-dismiss' => 'modal',
            'data' => array(
                'card_id' => $card_id,
                'user_id' => $user,
                'phone' => new CJavaScriptExpression('function(){return $("#phone").val();}'),
                'family' => new CJavaScriptExpression('function(){return $("#family").val();}'),
                'ot4estvo' => new CJavaScriptExpression('function(){return $("#ot4estvo").val();}'),
                'name' => new CJavaScriptExpression('function(){return $("#name").val();}'),
                'typek' => new CJavaScriptExpression("function(){return $('#typek').text();}"),
                'coment' => new CJavaScriptExpression('function(){return $("#coment").val();}'),
                'options_delivery' => new CJavaScriptExpression("function(){return $('#options_delivery').text();}"),
                'info_delivery' => new CJavaScriptExpression("function(){return $('input[name=\"flatsv\"]:checked').val();}"),
                'street_address' => new CJavaScriptExpression("function(){return $('#street_address').val();}"),
                'postcode' => new CJavaScriptExpression("function(){return $('#postcode').val();}"),
                'city' => new CJavaScriptExpression("function(){return $('#city').val();}"),
                'country' => new CJavaScriptExpression("function(){return $('#CountryList').val();}"),
                'state' => new CJavaScriptExpression("function(){return $('#state').val();}"),
            ),
            'beforeSend' => 'function(){
                $("#yt1").before("<div class=\"loading\"></div>");
                }',
                  'success'=>'function (data) {$("#CeateContent").html(data); $("#ncard").val(""); $("#email").val(""); $(".modal-scrollable").css({"display": "none"}); $(".modal-backdrop").css({"display": "none"}); }'
     
                ), array(
            'color' => TbHtml::BUTTON_COLOR_WARNING, 'style' => '')),
        TbHtml::button('Отмена', array('data-dismiss' => 'modal')),
    )),
));
?>


