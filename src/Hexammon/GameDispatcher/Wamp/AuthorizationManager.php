<?php

namespace Hexammon\GameDispatcher\Wamp;

use Thruway\Authentication\ClientAuthenticationInterface;
use Thruway\Peer\Client;

class AuthorizationManager
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client, ClientAuthenticationInterface $clientAuthentication)
    {
        $this->client = $client;
        $this->client->addClientAuthenticator($clientAuthentication);
        $this->client->setAuthId('admin');
        $this->client->setAuthMethods(['jwt']);
    }

    public function init()
    {
        $this->client->on('open', function (\Thruway\ClientSession $session) {

            $session->call('flush_authorization_rules', [true]);

            $initGameRule = new \stdClass();
            $initGameRule->role = 'init_game';
            $initGameRule->action = 'register';
            $initGameRule->uri = 'net.hexammon.init_game';
            $initGameRule->allow = true;
            $session->call('add_authorization_rule', [$initGameRule]);
        });

        $this->client->start(false);
    }
}