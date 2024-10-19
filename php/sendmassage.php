<?php
 $content = '';
 foreach ($_POST as $key => $value) {
    if($value){
        $content .= "<b>$key</b>: <i>$value</i>\n"; 
    }
 }
 if(trim($content)){
    $content = "<b>Message from Site:</b>\n".$content;
    $apiToken = "7755574201:AAGBW_etLbb43NxJvgnZL2NrDplxtFT-Dao";
    $data = [
        'chat_id' => '@MircheaLuslecI',
        'text' => $content,
        'parse_mode' => 'HTML'
    ];
    $responce = file_get_contents("https://api.telegram.org/bot$apiToken/sendmessage?".http_build_query($data));
 }
?>