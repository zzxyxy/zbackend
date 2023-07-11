<?php
include 'bootstrap.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$builder = new DI\ContainerBuilder();
#$builder->setDefinitionCache(new ApcCache());
$container = $builder->build();
$container->set('log\Logging', \log\Log::getInstance());

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
#        $req = file_get_contents('php://input');
        $req = $request->getBody();

        $url = "http://api.zxyxyhome.duckdns.org/api/v1/send/$topic" ;

        print($req);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $server_output = curl_exec($ch);

        curl_close($ch);

        $response->getBody()->write($server_output);
        return $response;
    }

    $response->getBody()->write("ERROR: content type must be application/json");
    $response->withStatus(400);
    return $response;
});

$app->run();
