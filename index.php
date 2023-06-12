<?php

include 'vendor\autoload.php';
foreach (glob("core/*.php") as $filename) {
    include $filename;
}

$server   = 'zxyxyhome.duckdns.org';
$port     = 1883;
$clientId = 'test-publisher';

$mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $clientId);
$connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
    ->setUsername("iot")
    ->setPassword("RyzYK8G53ZCnOR1OKlYL28yNoOagKG");

$mqtt->connect($connectionSettings);
$mqtt->publish('core', '{"req": "ping", "topic": "core"}', 0);
$mqtt->disconnect();


echo "end";
