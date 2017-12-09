<?php


namespace Hexammon\GameDispatcher;


use Lootils\Uuid\Uuid;

class Room
{
    private $owner;
    /**
     * @var GameConfigurationInterface
     */
    private $gameConfig;

    private $uiid;

    private $players = [];

    /**
     * Room constructor.
     */
    public function __construct(UserInterface $owner, GameConfigurationInterface $gameConfig)
    {
        $this->uiid = Uuid::createV4();
        $this->owner = $owner;
        $this->addPlayer($owner);
        $this->gameConfig = $gameConfig;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return GameConfigurationInterface
     */
    public function getGameConfig(): GameConfigurationInterface
    {
        return $this->gameConfig;
    }

    public function getUIID(): string
    {
        return $this->uiid;
    }

    public function getPlayers(): iterable
    {
        return $this->players;
    }

    public function addPlayer(UserInterface $user)
    {
        $this->players[$user->getUIID()] = $user;
    }

}