<?php 

       
// const TOKEN = '1076576616:AAHRJzO2jATi02X4y40lUloPMgj3LTOvYQ1238';
$update = json_decode(file_get_contents('php://input'),true);
$message = $update['message'];
$from = $message['from'];
$chat = $message['chat'];
$userid = $from['id'];
$chatid = $chat['id'];
$text = $message['text'];
$memessage_id = $message['message_id'];
$user_full_name = $from['first_name'].' '.$from['last_name'];

// file_get_contents('https://api.telegram.org/bot'.$token.'/sendmessage?chat_id='.$chatid.'&text='.$text);

function bot($method,$data = [],$token = '1076576616:AAHRJzO2jATi02X4y40lUloPMgj3LTOvYQ8'){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.$token.'/'.$method);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    return json_decode($res);
}   

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


/** Markdown format style
 *  ** bold to'q qora 
 * __ italic yotkan kursiv 
 *  https://core.telegram.org/bots/api#formatting-options
 */