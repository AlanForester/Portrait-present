<?php
/**
 *
 * main.php layout
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="">
            <link rel="shortcut icon" href="favicon.ico" >
                <base href="">
                    <title></title>
                    <?php
                    Yii::app()->clientScript->registerCssFile("css/main.css");
                    Yii::app()->clientScript->registerCssFile("css/stylesheet.css");
                    Yii::app()->clientScript->registerScriptFile("js/jscript/jquery/jquery-1.8.3.min.js");
                    
                    Yii::app()->clientScript->registerScriptFile("js/jscript/jquery/ajaxupload.js");
                    Yii::app()->clientScript->registerScriptFile("js/jscript/jquery/plugins/fancybox/source/jquery.fancybox.js?v=2.1.3");
                    Yii::app()->clientScript->registerCssFile("js/jscript/jquery/plugins/fancybox/source/jquery.fancybox.css?v=2.1.2");
                    Yii::app()->clientScript->registerCssFile("js/jscript/jquery/plugins/fw/style.css");
                    Yii::app()->clientScript->registerScriptFile("js/jscript/jquery/plugins/fw/freewall.js");
                    ?>
                    <script type="text/javascript" src="js/jscript/jquery/jquery.maskedinput.js"></script>
                    <script>
                       

                    </script>
                    <style type="text/css">
                        .free-wall {
                            margin: 10px;
                        }
                        
                    </style>
                    <script type="text/javascript">
                        
                        $(document).ready(function() {
                            var r = 0;
                            $('#rightrot').live("click", function() {
                                    r=parseInt(jQuery("#rot").text())+90;
                                    jQuery("#rotateImg").rotate({animateTo:r});
                                    jQuery("#rot").text(r);
                            }
                            );                          
                            $('#leftrot').live("click", function() {
                                
                                    r=parseInt(jQuery("#rot").text())-90;
                                    jQuery("#rotateImg").rotate({animateTo:r});
                                    jQuery("#rot").text(r);
                                    
                            }
                            ); 
                            $('#but1').live("click", function() {
                                $('#divh1').animate({height: "show"}, 500);
                                $('#divh2').animate({height: "hide"}, 500);
                                $('#divh3').animate({height: "hide"}, 500);
                                
                                $("#typek").text('1');
                            });
                            $('#but2').live("click", function() {
                                $('#divh2').animate({height: "show"}, 500);
                                $('#divh1').animate({height: "hide"}, 500);
                                $('#divh3').animate({height: "hide"}, 500);
                                
                                $("#typek").text('2');
                            });
                            $('#but3').live("click", function() {
                                $('#divh3').animate({height: "show"}, 500);
                                $('#divh2').animate({height: "hide"}, 500);
                                $('#divh1').animate({height: "hide"}, 500);
                                $("#typek").text('3');
                            });
                            
                            $("#CountryList").live('change', function() {
                                $.post('site/regions', {value: $(this).val()}, 
                                function(data) {
                                    if (data.length > 0) {
                                        $("#RegionList").html(data);
                                    }
                                });
                            });
                            
                             $("#customTabs ul li").live('click', function() {
                                var tab = $(this).find('a').attr('data-href');
                                $("#options_delivery").text($(this).attr('data-sid'));
                                $('#customTabs div').css('display', 'none');
                                $('#customTabs div#' + tab).css('display', 'block');
                                $('#customTabs #shipping-' + tab).attr('checked', 'checked');
                                $('#popup').alignCenter();
                                return false;
                            });
                            
                            $('#phone').live('click', function () {
                                if ($(this).val('')) {$(this).val('+7');}
                            });
                            
                            
                            
                            
                            
                            var wall = new freewall("#freewall");
                            wall.fitWidth();
                            $('.fancybox').fancybox({
                                'openEffect': 'elastic',
                                'openSpeed': 'slow'
                            });
                        

                            $.fn.SendCode = function(textCode) {
                                var el = $(this);
                                $.post('ajax_fw.php', textCode, function(data) {
                                    if (data.length > 0) {
                                        el.html(data);
                                        el.UplodStart();
                                    }
                                });
                            }
                            $.fn.colorizeButton = function() {
                                var el = $(this);
                                $.post('ajax_fw.php', {pid: el.val(), action: 'UpdateCart', content: 'ajax_fw'}, function(data) {
                                    if (data.length > 0 && data == 'ok') {
                                        $(".ViborProd").attr('class', 'ViborProd ColorVibor');
                                        $(".SelProductID:radio:checked").closest('div').attr('class', 'ViborProd ColorViborCur');
                                        $(".photoTovar").css('display', 'none');
                                        $("#ViborPhoto_" + el.val()).css('display', 'block');
                                    } else {
                                        alert(data);
                                    }
                                });
                            }
                            $(".ViborProd").live('click', function() {
                                $(this).find('input:radio').attr('checked', 'checked');
                                $(".SelProductID:radio:checked").colorizeButton();
                            });
                            $(".SelProductID").live('change', function() {
                                $(".SelProductID:radio:checked").colorizeButton();
                            });
                            $.fn.UplodStart = function() {
                                var btnUpload = $('#upload');
                                var status = $('#popup');
                                new AjaxUpload(btnUpload, {
                                    action: 'ajax_fw.php',
                                    data: {action: 'UploadPhoto', content: 'ajax_fw'},
                                    name: 'uploadfile',
                                    onSubmit: function(file, ext) {
                                        if ($.browser.msie) {
                                            $('#opaco').height($(document).height()).toggleClass('hiddenBox');
                                        } else {
                                            $('#opaco').height($(document).height()).toggleClass('hiddenBox').fadeTo('slow', 0.7);
                                        }
                                        $('#popup').alignCenter().toggleClass('hiddenBox');
                                        if (!(ext && /^(JPG|jpg|PNG|png|JPEG|jpeg|GIF|gif)$/.test(ext))) {
                                            // Валидация расширений файлов
                                            status.text('Только JPG, PNG, GIF файлы');
                                            return false;
                                        }
                                        status.text('Uploading...');
                                    },
                                    onComplete: function(file, response) {
                                        status.html(response);
                                        $("input[name=telephone]").mask('(999) 999-9999');
                                        var el = $("#customTabs ul li").first();
                                        var tab = el.find('a').attr('data-href');
                                        $('#customTabs div').css('display', 'none');
                                        $('#customTabs div#' + tab).css('display', 'block');
                                        $('#customTabs #shipping-' + tab).attr('checked', 'checked');
                                        $('#popup').alignCenter();
                                    }
                                });
                            }
                            $.fn.alignCenter = function() {
                                var marginLeft = Math.max(40, parseInt($(window).width() / 2 - $(this).width() / 2)) + 'px';
                                var marginTop = Math.max(40, parseInt($(window).height() / 2 - $(this).height() / 2)) + 'px';
                                return $(this).css({'margin-left': marginLeft, 'margin-top': marginTop});
                            };

                           
                            
                            $("#CheckOutShort").live('submit', function() {
                                $(":submit", this).attr("disabled", "disabled");
                                $.post('checkout_process_aj.php', $(this).serialize(), function(data) {
                                    if (data.length > 0 && data == 'ok') {
                                        alert(data);
                                        $("#CeateContent").html("<h2>Заказ принят</h2>");
                                        $('#opaco').html('').toggleClass('hiddenBox').removeAttr('style');
                                        $('#popup').html('').toggleClass('hiddenBox');
                                    } else {
                                        alert(data);
                                        $("#CheckOutShort:submit", this).removeAttr('disabled');
                                    }
                                });
                                return false;
                            });
                        });
                    </script>

                    </head>
                    <body>
                        
                        
                  
                        
                                
                                <table border="0" width="100%" cellpadding="0" cellspacing="0"><tr><td>
                                            <!-- warnings //-->

                                            <!-- warning_eof //-->
                                            <div class="headerTop flFon">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="right" height="80" width="400">
                                                            <?php echo CHtml::image('img/ugolok_top_left.png', 'портрет на заказ', array('border' => '0', 'title' => 'портрет на заказ', 'height' => '61')); ?>
                                                        </td>
                                                        <td class="mineTopMenu" width="100%">
                                                            <a href="#">КАК ЗАКАЗАТЬ ПОРТРЕТ</a><a href="#">АКТИВИРОВАТЬ КАРТУ</a><a href="#">УСЛУГИ</a><a href="#">КОРПОРАТИВНЫМ КЛИЕНТАМ</a><a href="#">ДОСТАВКА</a><a href="#">ОТЗЫВЫ</a><a href="#">ГДЕ КУПИТЬ</a></td>
                                                        <td align="right" height="80" width="200" valign="top"><?php echo CHtml::image('img/ugolok_top.png', 'портрет на заказ'); ?></td>
                                                    </tr>
                                                </table>		
                                            </div>
                                        </td></tr><tr><td>
                                            <div id="freewall" class="free-wall">
                                                <?php echo $content; ?>

                                            </div>
                                        </td></tr><tr><td>
                                            <div class='footer'>
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0"><tr>
                                                        <td align="center" height="80" valign="bottom" colspan="2"><?php echo CHtml::image('img/polosa.png'); ?>
                                                        </td></tr>
                                                    <tr><td class="mineFMenu">
                                                            <a href="#">КАК&nbsp;ЗАКАЗАТЬ&nbsp;ПОРТРЕТ</a><a href="#">АКТИВИРОВАТЬ&nbsp;КАРТУ</a><a href="#">УСЛУГИ</a><a href="#">КОРПОРАТИВНЫМ&nbsp;КЛИЕНТАМ</a><a href="#">ДОСТАВКА</a><a href="#">ОТЗЫВЫ</a><a href="#">ГДЕ&nbsp;КУПИТЬ</a>
                                                            <td align="left" height="80" width="300"><?php echo CHtml::image('img/socseti.png', 'Мы в соц.сетях'); ?></td>
                                                    </tr></table>
                                            </div>
                                        </td></tr></table>
                                <div id="opaco" class="hiddenBox"></div>
                                <div id="popup" class="hiddenBox"></div>
                                </body>
                                </html>









