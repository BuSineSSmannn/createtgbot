<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegramda BOT yasash #1</title>
    <style>
        span{
            width:100px;
            font-weight:bold;
            display:inline-block;
        }
        input,textarea{
            width:100px;
            resize: vertical; 
        }
    </style>
</head>
<body>
<?
        $token = '1105619407:AAGNDdKvKKVnW6D7MZTfnZ_b78bNaoFheaI'; //o'zini botizi tokeni
        if($_POST['submit']){
            file_get_contents('https://api.telegram.org/bot'.$token.'/sendmessage?chat_id='.$_POST['chat_id'].'&text='.$_POST['text']);
        }
?>

<form action="" method="POST">
    <span>Chat id:</span><input type="number" name="chat_id" required><br>
    <span>Matn:</span><textarea type="text" name="text" required></textarea><br>
    <input type="submit" value="Yuborish" name="submit">
</form>
</body>
</html>