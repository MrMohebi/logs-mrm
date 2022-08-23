<?php

namespace Mmmohebi\LogsMrm\general;

class General
{
    public static function curlGet($url, $params =[]):string{
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;
        }catch (\Exception $e){
            return false;
        }
    }

    public static function sendErrLog(string $message, $botName): void{
        $chatId = $_ENV['MY_TEL_ID'];
        $logBotToken = $_ENV['LOG_TOKEN'];
        self::curlGet("https://api.telegram.org/bot$logBotToken/sendMessage?chat_id=$chatId&text=Bot%3A%20$botName%3D%3E");
        self::curlGet("https://api.telegram.org/bot$logBotToken/sendMessage?chat_id=$chatId&text=$message");
    }
}