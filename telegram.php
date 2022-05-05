<?php

// Токен
$token = '5283498353:AAFkrF_f0oaFL-IxinKVujrcLyjETFnifDM';

// ID чата
$chat_id = '588083847';

$name = strip_tags(urlencode($_POST['name']));
$phonenumber = strip_tags(urlencode($_POST['phonenumber']));
$email = strip_tags(urlencode($_POST['email']));

$arr = array(
    'Имя пользователя: ' => $name,
    'Номер телефона: ' => $phonenumber,
    'Почта: ' => $email
);

foreach ($arr as $key => $value) {
    $txt .= "<b>".$key."</b>".$value."%0A";
};

$textSendStatus = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r"); 
$resData = array();
$resData["message"] = "123"; 
echo json_encode($resData);