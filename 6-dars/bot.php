<?php 
//@DevelopingBots
//+998914936969
if(count($_POST)){
    $uploadfile =  $_FILES['file']['tmp_name'];
    move_uploaded_file($uploadfile,'myfile.jpg');
    $send = bot('sendPhoto',[
        'chat_id'=>$_POST['chat_id'],
        'photo'=>new CURLFile('myfile.jpg')
    ]);
    unlink('myfile.jpg');
    $error = $send->description;
    if(isset($error)){
        bot('sendMessage',[
            'chat_id'=>$_GET['chat_id'],
            'text'=>$error
        ]);
    }
}
$update = json_decode(file_get_contents('php://input'),true);
$message = $update['message'];
$from = $message['from'];
$chat = $message['chat'];
$photo = $message['photo'];
$file_id1 = $photo[0]['file_id'];
$file_id2 = $photo[1]['file_id'];
$file_id3 = $photo[2]['file_id'];
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

if($text == 'cat'){

    bot('sendPhoto',[
    'chat_id'=>$chatid,
    'photo'=>'AgACAgIAAxkBAAIBr17FZ82Omhn3jnF-qFQWKII_kKEOAAJVrzEbSbspSrNLeWEmvJ-UFH1iky4AAwEAAwIAA3kAA7U7AAIZBA'
]);

}
if($text == 'cats'){
    $send = bot('sendPhoto',[
        'chat_id'=>$chatid,
        'photo'=>'https://cdn.cnn.com/cnn/interactive/2019/09/style/cat-photographer-cnnphotos/media/02.jpg'
    ]);
    $error = $send->description;
    if(!empty($error)){
        bot('sendMessage',[
            'chat_id'=>$chatid,
            'text'=>$error
        ]);
    }
}
if($text == 'blackcat'){

  
    $send = bot('sendPhoto',[
        'chat_id'=>$chatid,
        'photo'=>new CurlFile('myfile.jpg')
    ]);
    $error = $send->description;
    if(!empty($error)){
        bot('sendMessage',[
            'chat_id'=>$chatid,
            'text'=>$error
        ]);
    }

}

?>
<form method="POST" enctype="multipart/form-data">
    Chat id:<input type="number" name="chat_id" required><br>
    File:<input type="file" name="file" required><hr>
    <input type="submit" value="Yuborish">
</form>







