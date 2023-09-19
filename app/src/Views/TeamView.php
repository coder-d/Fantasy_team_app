<?php

namespace FantasyTeamApp\Views;

class TeamView
{
    public function render(array $team)
    {   
        // Start the output buffer to capture content
        ob_start();
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
        // End output buffering and capture the content
        $content = ob_get_clean();
        // Load the template HTML
        $template = file_get_contents(__DIR__ . '/../../../public/templates/template.html');
        // Replace the placeholder with the actual content
        $output = str_replace('<!-- CONTENT -->', $content, $template);
       
        // Print or echo the final output to be rendered in the browser
        echo $output;
    }
}