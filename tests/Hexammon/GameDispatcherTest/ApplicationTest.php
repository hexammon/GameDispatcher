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
        $room = array_shift($rooms);
        $this->assertSame($owner, $room->getOwner());
        $this->assertSame($gameConfig, $room->getGameConfig());

        $user = $this->createMock(UserInterface::class);
        $user->method('getUiid')->willReturn('FOO');
        $application->addPlayerToRoom($room, $user);
        $this->assertCount(2, $room->getPlayers());
    }
}