<?php

namespace FantasyTeamApp\Controllers;

use FantasyTeamApp\Factory\GameFactory;
use FantasyTeamApp\Views\TeamView;
use FantasyTeamApp\Observers\RecentPerformanceObserver;
use FantasyTeamApp\Observers\HistoricalStatisticsObserver;

class TeamController
{
    private $teamView;

    public function __construct(TeamView $teamView)
    {
        $this->teamView = $teamView;
    }

    public function createTeam()
    {
        // Create a cricket game instance using the GameFactory
        $gameFactory = new GameFactory();
        $cricketGame = $gameFactory->createGame('Cricket');

        // Define the list of players (sample data)
        $players = [
            // Define player data here
        ];

        // Register observers (e.g., RecentPerformanceObserver, HistoricalStatisticsObserver)
        $recentPerformanceObserver = new RecentPerformanceObserver($players);
        $historicalStatisticsObserver = new HistoricalStatisticsObserver($players);

        // Attach observers to the cricket game
        $cricketGame->attach($recentPerformanceObserver);
        $cricketGame->attach($historicalStatisticsObserver);

        // Create the cricket team based on the observers' suggestions
        $cricketTeam = $cricketGame->createTeam($players);

        // Render the team view with the created cricket team
        $this->teamView->render($cricketTeam);
    }
}