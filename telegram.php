<?php 


function telegram($method, $params, $token){

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.telegram.org/bot".$token."/$method",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => json_encode($params),
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    return "cURL Error #:" . $err;
    }else{
    return $response;
    }
}


?>