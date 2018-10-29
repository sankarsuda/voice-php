<?php

require __DIR__ . '/../vendor/autoload.php';

$response = new Mobtexting\Voice();
$response->answer();

$menu = $response->menu('gsm\/2018_10\/a25746c491c3889af3180d0f506af6f3.gsm');
$menu->onKeyPress("100", 'menu', ['gsm\/2018_10\/a25746c491c3889af3180d0f506af6f3.gsm']);

print_r($response->toArray());
