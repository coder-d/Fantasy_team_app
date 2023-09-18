<?php

namespace FantasyTeamApp\Views;

class TeamCreationView
{
    public function render()
    {
        // Start the output buffer to capture content
        ob_start();
        ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">Create Your Fantasy Team</h1>
                <form id="team-creation-form" class="needs-validation" novalidate>
                    <!-- Form fields go here -->
                    <div class="form-group">
                        <label for="team-name">Team Name:</label>
                        <input type="text" class="form-control" id="team-name" name="team-name" required>
                        <div class="invalid-feedback">
                            Team Name is required.
                        </div>
                    </div>
                    <!-- Add more form fields and validation as needed -->
                    <button type="submit" class="btn btn-primary btn-block">Create Team</button>
                </form>
                <!-- Include your TypeScript file here -->
                <script src="team-creation-form.js"></script>
            </div>
        </div>
    </div> 
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
