<?php

    

    $email= 'napawat3@gmail.com';
    $subject = 'Test E-Mail';
    $message = 'Testing the e-mail';
    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Krissada Kiatthanawit <kono-setsu_shana_nano-fate@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail($email, $subject, $message, $headers);
?>
