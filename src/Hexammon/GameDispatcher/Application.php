<?php

namespace Hexammon\GameDispatcher;

class Application
{

    /**
     * @var iterable|Room[]
     */
    private $rooms = [];

    public function __construct()
    {
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