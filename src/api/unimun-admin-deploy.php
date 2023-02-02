<?php

if(!isset($_GET['token'])){
    exit(401);
}

include_once "../config/index.php";

use SergiX44\Nutgram\Nutgram;
use Mmmohebi\LogsMrm\general\General;

try {
    $bot = new Nutgram($_ENV['TEL_BOT_TOKEN_LOG']);

    $telIds = [$_ENV['MY_TEL_ID'], "332750936"];

    array_map(function ($telID) use ($bot){
        $bot->sendMessage('unimun-admin '.$_GET['type'].' deploy FAILED!!! 🛑🛑🛑', ['chat_id' => $telID]);
    }, $telIds);

} catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
    General::sendErrLog($e->getMessage(),'unimun-admin-deploy');
}





