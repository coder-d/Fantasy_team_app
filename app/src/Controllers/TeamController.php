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
    public function createTeam(string $gameType, array $players)
    {

        // Sample player data (you can replace this with your actual player data)
        $players = [
            [
                'id' => 1,
                'name' => 'Player 1',
                'performanceScore' => 85,
            ],
            [
                'id' => 2,
                'name' => 'Player 2',
                'performanceScore' => 92,
            ],
            // Add more players with 'performanceScore' as needed
            [
                'id' => 21,
                'name' => 'Player 21',
                'performanceScore' => 78,
            ],
            [
                'id' => 22,
                'name' => 'Player 22',
                'performanceScore' => 89,
            ],
        ]; 

        // Call the createGame method as a static method
        $game = GameFactory::createGame($gameType, $players);

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