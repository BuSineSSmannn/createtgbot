<?php 

       
$token = '1076576616:AAHRJzO2jATi02X4y40lUloPMgj3LTOvYQ8';
$update = json_decode(file_get_contents('php://input'),true);
$message = $update['message'];
$from = $message['from'];
$chat = $message['chat'];
$userid = $from['id'];
$chatid = $chat['id'];
$text = $message['text'];

file_get_contents('https://api.telegram.org/bot'.$token.'/sendmessage?chat_id='.$chatid.'&text='.$text);
file_get_contents('https://api.telegram.org/bot'.$token.'/sendmessage?chat_id='.$userid.'&text=ishlamoqda');
