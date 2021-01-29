<?php 

//error_reporting(0);
require_once './env.php';
require_once './telegram.php';
require_once './curl.php';


$Body = json_decode(file_get_contents('php://input'), true);

echo $Body["action"];

if($Body["action"] == "opened"){
    
    
        $Body["issue"]["title"] = implode("", explode( ' is down', $Body["issue"]["title"])); 
        $Body["issue"]["title"] = implode("", explode( '🛑 ', $Body["issue"]["title"])); 

        $message_down_template = implode($Body["issue"]["title"], explode( '{service_name}', $message_down_template)); 
        $message_down_template = implode($status_link."history/".getslugbyname($Body["issue"]["title"], $status_raw), explode( '{status_link}', $message_down_template)); 
    echo $message_down_template;
    $response = array("chat_id"=>$chat_id,
    "text"=>$message_down_template,
    "reply_markup"=>$reply_down_markup,
    "disable_notification"=>$disable_down_notification,
    "parse_mode"=>$parse_mode);

    echo telegram('sendMessage', $response, $token);
}

if($Body["action"] == "closed"){
    
    
    $Body["issue"]["title"] = implode("", explode( ' is down', $Body["issue"]["title"])); 
    $Body["issue"]["title"] = implode("", explode( '🛑 ', $Body["issue"]["title"])); 

    $message_up_template = implode($Body["issue"]["title"], explode( '{service_name}', $message_up_template)); 
    $message_up_template = implode($status_link."history/".getslugbyname($Body["issue"]["title"], $status_raw), explode( '{status_link}', $message_up_template)); 
echo $message_up_template;
$response = array("chat_id"=>$chat_id,
"text"=>$message_up_template,
"reply_markup"=>$reply_up_markup,
"disable_notification"=>$disable_up_notification,
"parse_mode"=>$parse_mode);

echo telegram('sendMessage', $response, $token);
}

function getslugbyname($name, $status_raw){
    $res = json_decode(curl("GET", $status_raw,''), true);
    $n = 0;
    while(true){
        $next = $res[$n];
        if ($next){
            if ($next["name"] == $name){
                return  implode("\-", explode( '-', $next["slug"])); 
            }
        }else{
            break;
        }
    $n = $n+1;
    }
    return '';
}
?>