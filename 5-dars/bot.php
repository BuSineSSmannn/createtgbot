<?php 
//@DevelopingBots
//+998914936969

$update = json_decode(file_get_contents('php://input'),true);
$message = $update['message'];
$from = $message['from'];
$chat = $message['chat'];
$userid = $from['id'];
$chatid = $chat['id'];
$callback_query = $update['callback_query'];
$chatid2 = $callback_query['from']['id'];
$text = $message['text'];
$data = $callback_query['data'];
$memessage_id = $message['message_id'];
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
bot('sendMEssage',[
    'chat_id'=>$chatid,
    'text'=>$language_code
]);
bot('sendMEssage',[
    'chat_id'=>$chatid2,
    'text'=>$language_code
]);
if($text == 'salom'){
    $salomlashishlar = ['Assalomu aleykum','Salom','Qalesiz','Va alaykum assalom'];
    $rand_text = array_rand($salomlashishlar);
    
    bot('sendMessage',[
        'chat_id'=>$chatid,
        // 'text'=>"<pre>" .json_encode($update, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE). "</pre>",
        'text'=>$salomlashishlar[$rand_text].' <b>'.$user_full_name.'</b>',
        'parse_mode'=>'html',
    ]);
}
if($text == '/test'){
    
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'test',
        'parse_mode'=>'html',
    ]);
}
if($text == '/get'){
    $obj = bot('getMe');
    
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'https://telegram.org/blog/coronavirus',
        'parse_mode'=>'html',
        'disable_web_page_preview'=>true,
        'disable_notification'=>true,
        'reply_to_message_id'=>$memessage_id
    ]);
}
if($text == '/start' || $text == '/relang'){
    $keyboard = json_encode(
        [
           'keyboard'=> [
                [
                    ['text'=>'🇺🇿 Кирилча 🇺🇿'],
                    ['text'=>'🇺🇿 Lotincha 🇺🇿'],
                ],
                [
                    ['text'=>'FIO'],
                ]
                
                ],
                'resize_keyboard'=>true
        ]
    );
    
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'Tilni tanlang:',
        'reply_markup'=>$keyboard
    ]);
}
if($text == '/cancel'){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'ochirdik',
        'reply_markup'=>$rm
    ]);
}
if($text == '/inline'){
     $ikeyboard = json_encode([
       'inline_keyboard'=>[
           [
                ['text'=>'🇺🇿 Кирилча 🇺🇿','callback_data'=>'kiril'],
                ['text'=>'🇺🇿 Lotincha 🇺🇿','callback_data'=>'lotin'],
           ],
           [
            ['text'=>'test','callback_data'=>'test'],
   
           ]
       ]
    ]);
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'inline',
        'reply_markup'=>$ikeyboard
    ]);
}
$keyboard = json_encode(
    [
       'keyboard'=> [
            [
                ['text'=>'🇺🇿 Кирилча 🇺🇿'],
                ['text'=>'🇺🇿 Lotincha 🇺🇿'],
            ]
            ],
       'resize_keyboard'=>true
    ]
);
if($data == 'kiril'){
    bot('sendMessage',[
        'chat_id'=>$chatid2,
        'text'=>'Siz kirilchani tanladingiz',
    ]);
}
if($data == 'lotin'){
    bot('sendMessage',[
        'chat_id'=>$chatid2,
        'text'=>'Siz lotinchani tanladingiz',
    ]);
}
if($text == '🇺🇿 Кирилча 🇺🇿'){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'Siz kirilchani tanladingiz'."\n\nQaytadan tanlash uchun /relang deb yozing",
        'reply_markup'=>$rm
    ]);
}
if($text == '🇺🇿 Lotincha 🇺🇿'){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'Siz lotinchani tanladingiz'."\n\nQaytadan tanlash uchun /relang deb yozing",
        'reply_markup'=>$rm
    ]);
}
if($text == 'FIO'){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>'ISM familiyangizni kiriting:',
        'reply_markup'=>$fr
    ]);
}