<?php 

//@DevelopingBots

//+998914936969

$update = json_decode(file_get_contents('php://input'),true);

$message = $update['message'];

$from = $message['from'];

$chat = $message['chat'];


$userid = $from['id'];

$chatid = $chat['id'];



$text = $message['text'];



$user_full_name = $from['first_name'].' '.$from['last_name'];

$language_code  = $from['language_code'] ?: $callback_query['from']['language_code'];

function bot($method,$data = [],$token = '1076576616:AAFEtMhJ8tcvxkp0g1j7Fa-9SIciP735Gtk'){

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.$token.'/'.$method);

    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $res = curl_exec($ch);
    return json_decode($res);

}   

$rm = json_encode(['remove_keyboard'=>true]);

$fr = json_encode(['force_reply'=>true]);


if($text == 11){
$send = bot('sendVoice',[
    'chat_id'=>$userid,
    'voice'=>'AwACAgIAAxkBAAIIp17b7TOHdu9bRdksbBTQrI0gfCLaAALbBgACkjnhSuuv82xt5mP4GgQ'
]);

}

// bot('sendMessage',[
//     'chat_id'=>$userid,
//     'text'=>print_r($update,1)
// ]);


if($text == 'audio'){
   $send = bot('sendAudio',[
        'chat_id'=>$userid,
        'audio'=>'https://download.я.wiki/cache/4/81e/-2001799981_54799981.mp3?filename=MORGENSHTERN-%D0%9D%D0%BE%D0%B2%D1%8B%D0%B9%20%D0%9C%D0%B5%D1%80%D0%B8%D0%BD.mp3',
        'title'=>'test',
        'perfomer'=>'Akbarov Javoxir',
        'caption'=>'Akbarov Javoxir'
    ]);

    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>print_r($send,1)
    ]);
}


?>















