<?php


namespace Hexammon\GameDispatcher\Wamp;


use Hexammon\GameDispatcher\Application;
use Thruway\ClientSession;

class Router
{

    /**
     * @var Application
     */
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function bindActions(ClientSession $session)
    {
        $session->register($this->buildUri('rooms.create'), function ($args, $argKw, $details) {
            $owner = $this->getUserById($details->authid);
            $gameConfig = $args[0];
            $this->application->createRoom($owner, $gameConfig);
        }, ['disclose_caller'=>true]);
    }

    private function buildUri(string $suffix): string
    {
        return sprintf('net.haxammon.%s', $suffix);
    }
}