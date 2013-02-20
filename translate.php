<?php

//print_r($_POST);
  //  require_once 'index.php';
    $data=http_build_query($_POST);
    $contx=stream_context_create(array('http'=>array(
        'method'=>'GET',
        'header'=>'content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'content'=>'$data'
    )));
    http_build_query($contx);
  //  $result = readfile("http://slovari.yandex.ru/".$_POST[query]."/de-ru/",false,$contx);
    $html = file_get_contents("http://slovari.yandex.ru/".$_POST[query]."/de-ru/","rt");
//    $fp= fopen("http://slovari.yandex.ru/".$_POST[query]."/de-ru/","rt");
//    $cont=fread($fp,filesize($fp)); //возвращает строку длиной 38 символов 
//    echo($cont);
    // создаем новый dom-объект
    $dom = new domDocument;

    // загружаем html в объект
    $dom->loadHTML($html);
    $dom->preserveWhiteSpace = false;

    // элемент по тэгу
    foreach ($dom->getElementsByTagName('a') as $row)
        echo $row->GetAttribute('href').' ('.$row->nodeValue.')<br>';
 //   $result = fopen("http://slovari.yandex.ru/".$_POST[query]."/de-ru/", "r");
   json_encode($result);
?>