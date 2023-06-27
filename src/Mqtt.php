<?php

namespace zxyxy\mqtt;

class Mqtt implements Imqtt
{
    private $server;
    private $port;
    private $user;
    private $pass;
    private $clientId;
    private $mqtt;
    private $connectionSettings;

    public function __construct($server, $port, $user, $pass)
    {
        $this->server = $server;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->clientId = 'test-publisher';

        $this->mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $this->clientId);
        $this->connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
            ->setUsername("iot")
            ->setPassword("RyzYK8G53ZCnOR1OKlYL28yNoOagKG");
        $this->mqtt->connect($this->connectionSettings);
    }

    public function send($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0);
    }
}


#$server   = 'zxyxyhome.duckdns.org';
#$port     = 1883;
#$clientId = 'test-publisher';
#
#$mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $clientId);
#$connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
#    ->setUsername("iot")
#    ->setPassword("RyzYK8G53ZCnOR1OKlYL28yNoOagKG");
#
#$mqtt->connect($connectionSettings);
#$mqtt->publish('core', '{"req": "ping", "topic": "core"}', 0);
#$mqtt->disconnect();
#
