<?php 


function curl($method, $link, $params){

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $link,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $method,
    CURLOPT_POSTFIELDS => json_encode($params),
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo $err;
    return false;
    }else{
    return $response;
    }
}


?>