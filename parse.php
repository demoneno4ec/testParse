<?php

$authUrl = 'https://www.myarena.ru/ajax.php';

$parameters = [
    'action'    => 'checklogin',
    'ulogin'    => 'kalihec195',
    'upassword' => 'kalihec195xx',
    'gcode'     => '',
    'pcode'     => '',
    'ecode'     => '',
    'tcode'     => '',
    'capcode'   => '',
];

$url = $authUrl . '?' . http_build_query($parameters);
curl_download($url);

function curl_download($Url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__.'/cookie.txt');
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.myarena.ru/login.html');
    $http_headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:6.0.2) Gecko/20100101 Firefox/6.0.2',
        'Accept: */*',
        'Accept-Language: ru,ru-RU;q=0.9,en-US;q=0.8,en;q=0.7',
        'Sec-Fetch-Site: same-origin',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Dest: Sec-Fetch-Dest',
        'Connection: keep-alive',
        'X-Requested-With: XMLHttpRequest',
        'Pragma: no-cache',
    ];
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}