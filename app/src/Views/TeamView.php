<?php

namespace FantasyTeamApp\Views;

class TeamView
{
    public function render()
    {
        // You can use PHP to generate HTML content here
        echo '<h1>Fantasy Team Selection</h1>';
        echo '<form action="/submit" method="post">';
        // Add form fields, dynamic data, and logic here
        echo '<input type="submit" value="Submit Team">';
        echo '</form>';
    }
}