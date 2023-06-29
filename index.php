<?php
include 'bootstrap.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$builder = new DI\ContainerBuilder();
#$builder->setDefinitionCache(new ApcCache());
$container = $builder->build();
$container->set('log\Logging', \log\Log::getInstance());
#$container->set(
#    'zxyxy\mqtt\Imqtt',
#    new zxyxy\mqtt\Mqtt('zxyxyhome.duckdns.org', 1883, "iot", "RyzYK8G53ZCnOR1OKlYL28yNoOagKG")
#);

#$t = $container->get('\zxyxy\Test');
#$t->testlog('blabla');
#$t->send("testtopic", "testmessage");

$app = AppFactory::create();

$app->get('/api/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();
