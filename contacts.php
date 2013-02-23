<?php
//    print_r($_SERVER);
?>
<div id="introduction">
    <a id="increase" href="#"> Increase map </a>
    <a id="decrease" href="#" > Decrease map</a>
</div>
<div id="my_dates" style="float: left;">
    <div id="message">
        <h2>You can send me message</h2>
        <hr>
        <form name="message" method="post">
            <label id="email_label" style="float: left;">Your e-mail</label>
            <input type="edit" id="email" style="width: 271px; border-radius: 4px; border: 2px inset; margin-bottom: 15px;">
            <input type="hidden" id="time" value="<?php echo time();?>">
            <label id="message_label" style="float: left;">Your message</label>
            <textarea id="mes_text" maxlength="1000" style="width: 271px; height: 150px; border-radius: 4px; border: 2px inset; "></textarea>
            <input type="submit" value="Send" id="send" disabled="disabled" style="height: 30px; width: 100px; margin: 10px 0;">
        </form>
    </div>
</div>
<div id="map_canvas" style="width: 600px ; height: 340px; position: relative; float: right; display: block;">

</div>

<script language="javascript"> 

    function initializing(){

        var myLatlng = new google.maps.LatLng(40.72436422, -74.00115967);

        var myOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        
        var contentString = '<div id="my_comment">Ich bin hier!</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'I\'m hear!'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
        return;
    }
            initializing();
// ZOOM
    $('#decrease').hide();
    $(document).ready(function(){

        $('#map_canvas').delay(200);
        $('#increase').click(function(){
            $('#my_dates').fadeOut(300,function(){
                $('#map_canvas').animate({width: '896px', height: '418px'},1000);
            });            
            $('#increase').hide();
            $('#decrease').fadeIn(2000);
        });
        $('#decrease').click(function(){
            $('#map_canvas').animate({width: '600px', height: '340px'},1000,function(){
                $('#my_dates').fadeIn(300);
            });
            $('#decrease').hide();
            $('#increase').fadeIn(2000);
        });
    });





//  ГЛОБАЛЬНЫЕ ПЕРЕМЕННЫЕ СОСТОЯНИЯ ВАЛИДНОСТИ

email_valid =   false;
text_valid =    false;

/*
// ПРОВЕРЯЕМ ВАЛИДНОСТЬ Е-MAIL;
   
    $('#email').change(function(){
        var pattern = /^[a-z0-9_\.\-]+@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})$/i
        var mail = $('#email');

            if(mail.val() != ''){
                if(mail.val().search(pattern) == 0){
                    //    был невалидный или 1й раз валидный 
                    if(($('#email_invalid').length != 0) || ($('#email_valid').length == 0)){ 
                        $('#email_invalid').remove();
                        $('#email_label').after("<div id='email_valid'>&nbsp;is good</div>");
                        $('#email_valid').fadeIn('slow');
                        
                    //      если мыло и текст валидны - открываем кнопку
                        email_valid = true;
                        if((email_valid == true) && (text_valid == true)){
                            $('#send').removeAttr('disabled');
                        }
                    }

                    $('#email').css('border-color', 'green');
                    $('#email').css('background', 'rgba(0, 248, 20, 0.4)');
                    

                }
                else{
                    //если был валидный или 1й раз невалидный
                    if(($('#email_valid').length != 0) || ($('#email_invalid').length == 0)){      
                        $('#email_valid').remove();
                        $('#email_label').after("<div id='email_invalid'>&nbsp;is not valid</div>");
                        $('#email_invalid').fadeIn('slow');
                        
                    //      если хотя бы мыло невалидно - закрываем кнопку
                        email_valid = false;
                        $('#send').attr('disabled','disabled');
                    }

                    $('#email').css('border-color', 'red');
                    $('#email').css('background', 'rgba(255, 0, 0, 0.38)');
                }
            }
    });
    
//  ПРОВЕРЯЕМ ВАЛИДНОСТЬ ТЕКСТА СООБЩЕНИЯ
    $('#mes_text').change(function(){
        var pattern = /^[^]{10,1000}$/i;
        var text = $('#mes_text');
        
        if(text.val() != ''){
            if(text.val().search(pattern) == 0){
                //    был невалидный или 1й раз валидный 
                if(($('#text_invalid').length != 0) || ($('#text_valid').length == 0)){ 
                    $('#text_invalid').remove();
                    $('#message_label').after("<div id='text_valid'>&nbsp;is good</div>");
                    $('#text_valid').fadeIn(1000);
                    
                    //      если мыло и текст валидны - открываем кнопку
                    text_valid = true;
                    if((email_valid == true) && (text_valid == true)){
                        $('#send').removeAttr('disabled');
                    }

                }
            }
            else{
                if(($('#text_valid').length != 0) || ($('#text_invalid').length == 0)){      
                    $('#text_valid').remove();
                    $('#message_label').after("<div id='text_invalid'>&nbsp;is not valid</div>");
                    $('#text_invalid').fadeIn(1000);
                    
                    //      если хотя бы текст невалиден - закрываем кнопку
                    text_valid = false;
                    $('#send').attr('disabled','disabled');
                }
            }
        }
    });
    
*/
// ОТПРАВКА ДАННЫХ
    $('#send').click(function(){
        $.post(
            'message.php',
            {
                email:   $('#email').val(),
                mes_text: $('#mes_text').val(),
                cur_time: $('#time').val()
            },
            function(data){            
            // ПОЛУЧЕНИЕ И ВЫВОД СТАТУСА ОТПРАВКИ
                $('#send').attr('disabled','disabled');
                $('body').prepend("<div id='message_form' class='form'><p>"+data['status']+"</p><p>"+data['text']+"</p></div>");
                $('#message_form').fadeIn(1000,function(){
                     $('#message_form').fadeOut(1000);
                 });
//                $('#message_form').fadeIn(1000);
//                setInterval($('#message_form').fadeIn(1000),3);
              
            },'json'
        )
        return false;
    });
</script>