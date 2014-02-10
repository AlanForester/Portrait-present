
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array(
        'id' => 'myModal',
        'header' => 'Modal Heading',
        'content' => $this->renderPartial("_modalContent",[
            'id' => $id,
            'painterslist' => $painterslist,
            'card_id' => $card_id, 
            'typek' => $typek,
            'name' => $name,
            'family' => $family,
            'ot4estvo' => $ot4estvo,
            'phone' => $phone,
            'email' => $email,
            'options_delivery' => $options_delivery,
            'info_delivery' => $info_delivery,
            'coment' => $coment,
            ],true,false),
        
        'show' => true,
        'footer' => array(
            /*TbHtml::ajaxButton('Оформить заказ', Yii::app()->createUrl('/site/zakazend'), array(
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
            'color' => TbHtml::BUTTON_COLOR_WARNING, 'style' => '')),*/
            TbHtml::linkButton('Save Changes', array(
                'url' => Yii::app()->createUrl('/site/addcard'), 
                'data-dismiss' => 'modal', 
                'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::button('Close', array('data-dismiss' => 'modal')),
        ),
    )
); ?>
<?php $this->endWidget("myModal"); ?>