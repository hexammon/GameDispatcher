<?php


namespace Hexammon\GameDispatcher;


class Room
{
    private $owner;
    /**
     * @var GameConfigurationInterface
     */
    private $gameConfig;

    /**
     * Room constructor.
     */
    public function __construct(UserInterface $owner, GameConfigurationInterface $gameConfig)
    {
        $this->owner = $owner;
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
}