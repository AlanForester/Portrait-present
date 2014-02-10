
<?php Yii::app()->clientScript->registerScriptFile("http://www.xiper.net/examples/js-plugins/effects/jqueryrotate/js/jqueryrotate.2.1.js");?>
<div id="popup1" class="" ><form id="CheckOutShort" method="post"><table border="0">
            <tbody><tr><td style="width: 448px; text-align: center; padding-top: 50px;"><img class="UserPhotoLoad" id="rotateImg" src="<?=Images::i($card_id)?>"><br>
                        <div id="leftrot" >-90</div> <div id="rightrot">+90</div><div id="rot" style="display: none">0</div>
                    
                    
                    
                    
                    </td><td><table border="0" width="100%">
			  <tbody><tr>
                <td class="main">Имя:</td>
                <td class="main"><input type="text" class="input-class" id="name" name="firstname" value="<?=$name?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Отчество:</td>
                <td class="main"><input type="text" class="input-class" id="ot4estvo" name="midname" value="<?=$ot4estvo?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Фамилия:</td>
                <td class="main"><input type="text" class="input-class" id="family" name="lastname" value="<?=$family?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Телефон:</td>
                <td class="main"><?php $this->widget(
            'yiiwheels.widgets.maskinput.WhMaskInput',
            array(
                'name'        => 'telephone',
                'mask'        => '+7(999) 999-9999',
                'val' => $phone,
                'htmlOptions' => array('placeholder' => '+7(345)345-3454',  'id'=>'phone')
            )
        );?>&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
</tbody></table>
Код карты предоплаты<input type="radio" name="payment" value="cartcod" checked=""><div id="customTabs"><ul>
<li data-sid="flatsv"><a href="#" data-href="tabs-1">Самовывоз из OUTPOST</a></li>
<li data-sid="flattk"><a href="#" data-href="tabs-2">Доставка</a></li>
</ul>
    <div id="options_delivery" style="display: none">flatsv</div>
<div id="tabs-1" style="display: block;">
<p><input type="radio" id="shipping-tabs-1" name="shipping" value="flatsv_flatsv" checked="checked">&nbsp;Выберите пункт самовывоза</p>
<?=$plist?>
</div>
<div id="tabs-2" style="display: none;">
<p><input type="radio" id="shipping-tabs-2" name="shipping" value="flattk_flattk">&nbsp;Стоимость доставки уточниться после обработки заказа</p>
<p></p><table border="0">              <tbody><tr>
                <td class="main">Адрес:</td>
                <td class="main"><input type="text" id="street_address" class="input-class" name="street_address">&nbsp;<span class="inputRequirement">* Пример: ул. Мира 346, кв. 78</span></td>
              </tr>              <tr>
                <td class="main">Почтовый индекс:</td>
                <td class="main"><input type="text" id="postcode" class="input-class" name="postcode">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>              <tr>
                <td class="main">Город:</td>
                <td class="main"><input type="text" id="city" class="input-class" name="city">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>              <tr>
                <td class="main">Страна:</td>
                <td class="main"><select name="country" id="CountryList"><?=$clist?></select>&nbsp;<span class="inputRequirement">*</span></td>
              </tr>             <tr>
               <td class="main">Регион:</td>
               <td class="main">
               <span id="RegionList"><?=$rlist?></span>&nbsp;<span class="inputRequirement">*</span></td>
             </tr></tbody></table>
<p></p>
</div>
</div>
<div><textarea name="comments" id="coment" wrap="soft" cols="60" rows="3"></textarea></div>
</td></tr></tbody></table></form></div>