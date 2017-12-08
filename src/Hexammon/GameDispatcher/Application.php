<?php

namespace Hexammon\GameDispatcher;

class Application
{

    private $rooms = [];

    public function createRoom(UserInterface $owner, GameConfigurationInterface $boardConfig)
    {
        $this->rooms[] = new Room();
    }

    public function getRooms(): iterable
    {
        return $this->rooms;
    }
}