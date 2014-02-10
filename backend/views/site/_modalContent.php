
<div id="popup1" class="" ><form id="CheckOutShort" action="/site/addcard" method="post">
        <table border="0" width="100%">
		<tbody>
                              <tr>
                                  <td class="main" colspan="2">
                                      <img class="UserPhotoLoad" src="<?=Images::i($card_id)?>"><br>
                                      <a href="/image.jpg" target="_blank">полное изображение</a>
                                  </td>
              </tr>         
                              <tr>
                <td class="main">Тип картины:</td>
                <td class="main"><?=$typek?></td>
              </tr>            
              <tr>
                <td class="main">Коментарий:</td>
                <td class="main"><?=$coment?></td>
              </tr>
              <tr>
                <td class="main">Художник:</td>
                <td class="main"><select name="country" id="CountryList"><?=$painterslist?></select></td>
              </tr>
              <tr>
                <td class="main">Имя заказчика:</td>
                <td class="main"><?=$name?></td>
              </tr>
              <tr>
                <td class="main">Отчество заказчика:</td>
                <td class="main"><?=$ot4estvo?></td>
              </tr>
              <tr>
                <td class="main">Фамилия заказчика:</td>
                <td class="main"><?=$family?></td>
              </tr>
              <tr>
                <td class="main">Телефон заказчика:</td>
                <td class="main"><?=$phone?></td>
              </tr>
              <tr>
                <td class="main">Почта заказчика:</td>
                <td class="main"><?=$email?></td>
              </tr>              
              <tr>
                <td class="main">Вариант доствки:</td>
                <td class="main"><?=$options_delivery?></td>
              </tr>             
              <tr>
                <td class="main">Информация о доствке:</td>
                <td class="main"><?=$info_delivery?></td>
              </tr>
</tbody></table>

</form></div>