<?php
include 'bootstrap.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$builder = new DI\ContainerBuilder();
#$builder->setDefinitionCache(new ApcCache());
$container = $builder->build();
$container->set('log\Logging', \log\Log::getInstance());
$container->set(
    'zxyxy\mqtt\Imqtt',
    new zxyxy\mqtt\Mqtt('zxyxyhome.duckdns.org', 1883, "iot", "RyzYK8G53ZCnOR1OKlYL28yNoOagKG")
);


$app = AppFactory::create();

$app->get('/api/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});


$app->post('/api/v1/send/{topic}', function (Request $request, Response $response, array $args) use ($container) {
    $topic = $args['topic'];
    $contentType = $request->getHeaderLine('Content-Type');

    if (strstr($contentType, 'application/json')) {
        $req = file_get_contents('php://input');

        $t = $container->get('\zxyxy\Test');
        $t->send($topic, $req);

        $response->getBody()->write('{"result": "ok"}');
        return $response;
    }

    $response->getBody()->write("ERROR: content type must be application/json");
    $response->withStatus(400);
    return $response;
});

$app->run();
