<?php

namespace FantasyTeamApp\Factory;

use FantasyTeamApp\Game\CricketGame;
use FantasyTeamApp\Game\FootballGame;

class GameFactory
{
    public static function createGame($gameType)
    {
        switch ($gameType) {
            case 'Cricket':
                return new CricketGame();
            case 'Football':
                return new FootballGame();
            default:
                throw new \InvalidArgumentException('Invalid game type.');
        }
    }
}