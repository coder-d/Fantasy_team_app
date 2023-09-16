<?php

namespace FantasyTeamApp\Tests\Unit\Views;

use PHPUnit\Framework\TestCase;
use FantasyTeamApp\Views\TeamView;

class TeamViewTest extends TestCase
{
    public function testRenderWithEmptyTeam()
    {
        // Create an instance of TeamView
        $teamView = new TeamView();

        // Create a mock output buffer to capture the rendered HTML
        ob_start();
        $teamView->render([]);
        $output = ob_get_clean();

        // Assert that the rendered HTML contains the "No team data available" message
        $this->assertStringContainsString('No team data available', $output);
    }

    public function testRenderWithTeam()
    {
        // Create an instance of TeamView
        $teamView = new TeamView();

        // Sample team data
        $team = [
            'team' => [
                ['name' => 'Player 1'],
                ['name' => 'Player 2'],
            ],
        ];

        // Create a mock output buffer to capture the rendered HTML
        ob_start();
        $teamView->render($team);
        $output = ob_get_clean();

        // Assert that the rendered HTML contains the player names
        $this->assertStringContainsString('Player 1', $output);
        $this->assertStringContainsString('Player 2', $output);
    }
}