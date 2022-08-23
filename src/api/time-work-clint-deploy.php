<?php
include_once "../config/index.php";

use SergiX44\Nutgram\Nutgram;
use Mmmohebi\LogsMrm\general\General;

try {
    $bot = new Nutgram($_ENV['TEL_BOT_TOKEN_LOG']);

    $telIds = [$_ENV['MY_TEL_ID'], "332750936"];

    array_map(function ($telID) use ($bot){
        $bot->sendMessage('time-work-clint deploy failed!!! 🛑🛑🛑', ['chat_id' => $telID]);
    }, $telIds);

} catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
    General::sendErrLog($e->getMessage(),'time-work-clint-deploy');
}





