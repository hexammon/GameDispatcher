<?php

namespace Hexammon\GameDispatcher;

use Hexammon\GameDispatcher\Wamp\AuthorizationManager;

class Application
{

    /**
     * @var iterable|Room[]
     */
    private $rooms = [];
    /**
     * @var AuthorizationManager
     */
    private $authorizationManager;

    public function __construct(AuthorizationManager $authorizationManager)
    {
        $this->authorizationManager = $authorizationManager;
    }

    public function run()
    {
        $this->authorizationManager->init();
    }

    public function createRoom(UserInterface $owner, GameConfigurationInterface $gameConfig)
    {
        $room = new Room($owner, $gameConfig);
        $this->rooms[$room->getUIID()] = $room;
    }

    /**
     * @return iterable|Room[]
     */
    public function getRooms(): iterable
    {
        return $this->rooms;
    }

    public function addPlayerToRoom(Room $room, UserInterface $user)
    {
        $room->addPlayer($user);
    }
}