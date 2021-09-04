<?php
    
    error_reporting(0);
    function telegram_message($message) {
        $curl = curl_init();
        $token  = "your telegram bot token";
        $chat_id  = "your groub chat-id";
        $format   = 'HTML';
        curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'. $token .'/sendMessage?chat_id='. $chat_id .'&text='. urlencode($message) .'&parse_mode=' . $format);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($curl);
        curl_close($curl);
        return true;
    }
    if ($_POST['what'] == "commande") {
        $message .= "/-- Commande INFOS --/ \r\n";
        $message .= 'Nom : ' . $_POST['name'] . "\r\n";
        $message .= 'Telephone : ' . $_POST['tel'] . "\r\n";
        $message .= 'Adresse : ' . $_POST['adresse'] . "\r\n";
        $message .= "/-- END Commande INFOS --/ \r\n";
        telegram_message($message);
    }
    if ($_POST['what'] == "contact") {
        $message .= '/-- contact INFOS --/' . get_client_ip() . "\r\n";
        $message .= 'Nom : ' . $_POST['ism'] . "\r\n";
        $message .= 'Telephone : ' . $_POST['hatif'] . "\r\n";
        $message .= 'Message : ' . $_POST['risala'] . "\r\n";
        $message .= '/-- END contact INFOS --/' . "\r\n";
        telegram_message($message);
    }
?>
