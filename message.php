<?php

    $salt = '34ru4???8fdjsk><:Lgjdsfh94';

   // распарсим POST в переменные
    $email = htmlspecialchars($_POST['email']);
    $text  = $_POST['mes_text'];    // мерим длину затем меняем теги
    $date  = date('d.m.Y', $_POST['cur_time']);
    $time  = date('H.i.s', $_POST['cur_time']);
    
    $email_pattern = '/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9._-]{2,20})\.([\w]{2,4})$/';
    $text_pattern = '/^([\w\s\S]{10,1000})$/';
    
    if((preg_match($email_pattern, $email) == 0) || (preg_match($text_pattern, $text) == 0)){
        $result = array(status => 'uncorrect', text => htmlspecialchars($text), text_length => strlen($text),
            email => $email);
    }
    elseif((preg_match($email_pattern, $email) == 1) && (preg_match($text_pattern, $text) == 1)) {
   
        $text  = htmlspecialchars($_POST['mes_text']);

    // собираем файл
        $file_text = "<br>
        <div id="."\"".md5($email.$salt)."\""." class=\"messages\" class=\"{$date}\">
                        <div id=\"mail_from\" class=\"mail_from\">mail from: 
                            <p>{$email}</p></div>
                        <div id=\"text_message\" class=\"text_msg\">text message: 
                            <p>{$text}</p></div>
                        <div id=\"time\" class=\"time\">time: 
                            <p>{$time}</p></div>
                        <div id=\"{$_SERVER[REMOTE_ADDR]}\" class=\"user_ip\">IP-adress: 
                            <p>{$_SERVER[REMOTE_ADDR]}</p></div>
        </div><br>";

    // пишем в файл                            
        $f = fopen('34ru4???8fdjsk><:Lgjdsfh94', 'a+') or die('pizdes');
        fwrite($f, $file_text);
        fflush('_.html');
        
    // отправляем результат в шаблон
        $result = array(status => 'correct', 
            text => htmlspecialchars($text),  
            text_length => strlen($text),
            email => $email);
    }
    else{
            $result = array(status => 'HZ', 
            email => $email);
    };
    echo json_encode($result);
 /*   
//  begin debuging
    $result = array(
            email => $email,
            text => $text,
            date => $date,
            time => $time
    );
    $status = array(
        status => 'Your message was delivered!'
    );
  *
  */
// end debuging
?>