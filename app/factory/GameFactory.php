<?php

namespace FantasyTeamApp\Factory;

use FantasyTeamApp\Game\CricketGame;
use FantasyTeamApp\Game\FootballGame;

class GameFactory
{
    public static function createGame($gameType, array $players)
    {   
        switch ($gameType) {
            case 'Cricket':
                return new CricketGame($players);
            case 'Football':
                //return new FootballGame();
            default:
                throw new \InvalidArgumentException('Invalid game type.');
        }
    }
}