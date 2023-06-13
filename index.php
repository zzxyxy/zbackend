<?php
include 'bootstrap.php';

$builder = new DI\ContainerBuilder();
#$builder->setDefinitionCache(new ApcCache());
$container = $builder->build();
$container->set('log\Logging', \log\Log::getInstance());
$container->set(
    'zxyxy\mqtt\Imqtt',
    new zxyxy\mqtt\Mqtt('zxyxyhome.duckdns.org', 1883, "iot", "RyzYK8G53ZCnOR1OKlYL28yNoOagKG")
);

$t = $container->get('\zxyxy\Test');
$t->testlog('blabla');
$t->send("testtopic", "testmessage");
