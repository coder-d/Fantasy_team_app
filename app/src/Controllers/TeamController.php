<?php

namespace FantasyTeamApp\Controllers;

use FantasyTeamApp\Factory\GameFactory;
use FantasyTeamApp\Views\TeamView;
use FantasyTeamApp\Observers\RecentPerformanceObserver;
use FantasyTeamApp\Observers\HistoricalStatisticsObserver;

/**
 * Class TeamController
 * @package FantasyTeamApp\Controllers
 */
class TeamController
{
    /** @var TeamView */
    private $teamView;

    /**
     * TeamController constructor.
     * @param TeamView $teamView
     */
    public function __construct(TeamView $teamView)
    {
        $this->teamView = $teamView;
    }

    /**
     * Create a team based on the specified game type.
     *
     * @param string $gameType The type of game (e.g., 'Cricket', 'Football')
     */
    public function createTeam(string $gameType)
    {
        // Create a game instance using the GameFactory
        $gameFactory = new GameFactory();
        $game = $gameFactory->createGame($gameType);

        // Define the list of players (sample data)
        $players = [
            // Define player data here
        ];

        // Register observers (e.g., RecentPerformanceObserver, HistoricalStatisticsObserver)
        $recentPerformanceObserver = new RecentPerformanceObserver($players);
        $historicalStatisticsObserver = new HistoricalStatisticsObserver($players);

        // Attach observers to the game
        $game->attach($recentPerformanceObserver);
        $game->attach($historicalStatisticsObserver);

        // Create the team based on the observers' suggestions
        $team = $game->createTeam($players);

        // Render the team view with the created team
        $this->teamView->render($team);
    }
}