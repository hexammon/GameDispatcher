<?php

require __DIR__ . '/../vendor/autoload.php';


$loop = React\EventLoop\Factory::create();
$client = new \Thruway\Peer\Client('hexammon');

$jwt = (new \FreeElephants\Jwt\Firebase\FirebaseEncoderAdapter('foo'))->encode([
    'authid' => 'admin',
    'authroles' => ['admin']
], 'HS256');
$clientAuthentication = new \Hexammon\GameDispatcher\Wamp\JwtClientAuthentication($jwt, 'admin');
$authManager = new \Hexammon\GameDispatcher\Wamp\AuthorizationManager($client, $clientAuthentication);

$application = new \Hexammon\GameDispatcher\Application($authManager);

$loop->run();
