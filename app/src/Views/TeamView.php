<?php

namespace FantasyTeamApp\Views;

class TeamView
{
    public function render(array $team)
    {
        // You can use PHP to generate HTML content here
        echo '<h1>Fantasy Team Selection</h1>';
        
        // Check if the team is empty
        if (empty($team)) {
            echo '<p>No team data available.</p>';
        } else {
            echo '<h2>Selected Team</h2>';
            echo '<ul>';
            foreach ($team['team'] as $player) {
                echo '<li>' . $player['name'] . '</li>';
            }
            echo '</ul>';
        }

        echo '<form action="/submit" method="post">';
        // Add form fields, dynamic data, and logic here
        echo '<input type="submit" value="Submit Team">';
        echo '</form>';
    }
}
