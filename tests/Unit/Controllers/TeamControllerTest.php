<?php

namespace FantasyTeamApp\Tests\Unit\Controllers;

use FantasyTeamApp\Controllers\TeamController;
use FantasyTeamApp\Views\TeamView;
use PHPUnit\Framework\TestCase;
use FantasyTeamApp\Observers\ObserverInterface;
use FantasyTeamApp\Observers\HistoricalStatisticsObserver;
use FantasyTeamApp\Factory\GameFactory;

class TeamControllerTest extends TestCase
{
    public function testCreateTeam()
    {
        // Create a mock for TeamView (you can replace this with your actual TeamView implementation)
        $teamView = $this->getMockBuilder(TeamView::class)->getMock();

        // Create an instance of TeamController with the mock TeamView
        $controller = new TeamController($teamView);

        // Define the game type (e.g., 'Cricket', 'Football')
        $gameType = 'Cricket';
        // Define sample player data
        $players = [
            [
                'id' => 1,
                'name' => 'Player 1',
            ],
            [
                'id' => 2,
                'name' => 'Player 2',
            ],
            // Add more players here
        ];

        // Create the game instance
        $gameFactory = new GameFactory();
        $game = $gameFactory->createGame($gameType, $players);

        // Create a mock for ObserverInterface
        $observerInterface = $this->createMock(ObserverInterface::class);
        // Attach the ObserverInterface to the game
        $game->attach($observerInterface);

        // Create a mock for HistoricalStatisticsObserver
        $historicalStatisticsObserver = $this->createMock(HistoricalStatisticsObserver::class);
        // Attach the HistoricalStatisticsObserver to the game
        $game->attach($historicalStatisticsObserver);

        // Assert that the method does not throw an exception
        $this->assertNull($controller->createTeam($gameType, $players));
    }



}