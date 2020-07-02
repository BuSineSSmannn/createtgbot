<?php
/**
@DevelopingBots
+998917910090
*/
$update = json_decode(file_get_contents('php://input'),true);
$message = $update['message'];
$from = $message['from'];
$chat = $message['chat'];
$userid = $from['id'];
$chatid = $chat['id'];
$text = $message['text'];
$data = $update['callback_query']['data'];
$chatid2 = $update['callback_query']['from']['id'];
$cid = $update['callback_query']['id'];
$user_full_name = $from['first_name'].' '.$from['last_name'];

function bot($method,$data = [],$token = '1076576616:AAF107dsKCQn4O-5YGEX8n8zpJhYgYVqOM0'){

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.$token.'/'.$method);

    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $res = curl_exec($ch);
    return json_decode($res);

}   

$darslar = [
    'du'=>"1-Algebra,
2-Geometriya,
3-Fizika,
4-Kimyo",
    'se'=>"1-Algebra,
2-Geometriya,
3-Fizika,
4-Kimyo",
    'ch'=>"1-Algebra,
2-Geometriya,
3-Fizika,
4-Kimyo",
    'pa'=>"1-Algebra,
2-Geometriya,
3-Fizika,
4-Kimyo",
    'ju'=>"1-Algebra,
2-Geometriya,
3-Fizika,
4-Kimyo",
    'sh'=>"1-Algebra,
2-Geometriya,
3-Fizika"

    
];
if($text == '/start'){
    $keyboard = json_encode([
        'inline_keyboard'=>
        [
            [
                ['text'=>'Dushanba','callback_data'=>'du']
            ],
            [
                ['text'=>'Seshanba','callback_data'=>'se']
            ],
            [
                ['text'=>'Chorshanba','callback_data'=>'ch']
            ],
            [
                ['text'=>'Payshanba','callback_data'=>'pa']
            ],
            [
                ['text'=>'Juma','callback_data'=>'ju']
            ],
            [
                ['text'=>'Shanba','callback_data'=>'sh']
            ],
        ]
    ]);
    bot('sendMessage',[
       'chat_id'=>$chatid,
       'text'=>'Hafa kunini tanlang:',
       'reply_markup'=>$keyboard
    ]);
}
 if($data){
    bot('answerCallbackQuery',[
        'callback_query_id'=>$cid,
        'text'=>$darslar[$data],
        'show_alert'=>true
    ]);
}

?>