<?php

namespace FantasyTeamApp\Views;

class TeamCreationView
{
    public function render()
    {
        // Start the output buffer to capture content
        ob_start();
        ?>

        <h1>Create Your Fantasy Team</h1>
        <form id="team-creation-form" method="POST">
            <!-- Form fields go here -->
            <label for="team-name">Team Name:</label>
            <input type="text" id="team-name" name="team-name" required>
            <!-- Add more form fields and validation as needed -->
            <button type="submit">Create Team</button>
        </form>

        <!-- Include your TypeScript file here -->
        <script src="../public/js/team-creation-form.js"></script>
        
        <?php
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
