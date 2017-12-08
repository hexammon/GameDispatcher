<?php

namespace Hexammon\GameDispatcherTest;

use Hexammon\GameDispatcher\Application;
use Hexammon\GameDispatcher\GameConfigurationInterface;
use Hexammon\GameDispatcher\UserInterface;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{

    public function testCreateGameWorker()
    {
        $application = new Application();
        $owner = $this->createMock(UserInterface::class);
        $gameConfig = $this->createMock(GameConfigurationInterface::class);
        $application->createRoom($owner, $gameConfig);
        $rooms = $application->getRooms();
        $this->assertCount(1, $rooms);
        $room = $rooms[0];
        $this->assertSame($owner, $room->getOwner());
        $this->assertSame($gameConfig, $room->getGameConfig());
    }
}