<?php

namespace Hexammon\GameDispatcher\Wamp;

use Thruway\Authentication\ClientAuthenticationInterface;
use Thruway\Message\AuthenticateMessage;

class JwtClientAuthentication implements ClientAuthenticationInterface
{

    private $authId;
    /**
     * @var string
     */
    private $jwt;

    public function __construct(string $jwt, $authid)
    {
        $this->jwt = $jwt;
        $this->authId = $authid;
    }

    /**
     * Get AuthID
     *
     * @return mixed
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * Set AuthID
     *
     * @param mixed $authid
     */
    public function setAuthId($authid)
    {
        $this->authId = $authid;
    }

    /**
     * Get list supported authentication method
     *
     * @return array
     */
    public function getAuthMethods()
    {
        return ['jwt'];
    }

    /**
     * Get authentication message from challenge message
     *
     * @param \Thruway\Message\ChallengeMessage $msg
     * @return \Thruway\Message\AuthenticateMessage|boolean
     */
    public function getAuthenticateFromChallenge(\Thruway\Message\ChallengeMessage $msg)
    {
        return new AuthenticateMessage($this->jwt);
    }
}