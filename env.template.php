<?php
$status_link = "https://ifrs-sertao.github.io/status/";
$status_raw = "https://raw.githubusercontent.com/ifrs-sertao/status/master/history/summary.json";

// Message information
$message_down_template = "🛑 *{service_name}* está temporariamente inativo. A CTI já está trabalhando para traze-lo de volta. [Mais informções]({status_link})";
$disable_down_notification = 'true';
$reply_down_markup = "";

$message_up_template = "✅ *{service_name}* está funcionando normalmente.";
$disable_up_notification = 'true';
$reply_up_markup = "";

$parse_mode = "MarkdownV2";

// Telegram information
$token = "";
$chat_id = "";

// 
if ($parse_mode == "MarkdownV2"){
    $status_link = implode("\-", explode( '-',  $status_link));
    $message_down_template = implode("\.", explode( '.',  $message_down_template));
    $message_down_template = implode("\-", explode( '-',  $message_down_template));
    $message_up_template = implode("\.", explode( '.',  $message_up_template));
    $message_up_template = implode("\-", explode( '-',  $message_up_template));

}

//$reply_down_markup = "{\"inline_keyboard\":[[{\"text\":\"Sistemas de Chamados\",\"callback_data\":\"upvote\"},{\"text\":\"✅  1225ms\",\"callback_data\":\"upvote\"}]]}"
?>