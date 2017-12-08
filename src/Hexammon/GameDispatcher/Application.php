<?php

namespace Hexammon\GameDispatcher;

class Application
{

    private $rooms = [];

    public function createRoom(UserInterface $owner, GameConfigurationInterface $gameConfig)
    {
        $this->rooms[] = new Room($owner, $gameConfig);
    }

    /**
     * @return iterable|Room[]
     */
    public function getRooms(): iterable
    {
        return $this->rooms;
    }
}