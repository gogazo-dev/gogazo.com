<?php


$from = "test@hostinger-tutorials.com";
$to = "info.gogazo@gmail.com";
$subject = "Checking PHP mail";
$message = "";
$headers = "From:" . $from;
$mail=mail($to, $subject, $message);

if($mail){
    echo "ok";
}else{
    echo "error".$mail;
}