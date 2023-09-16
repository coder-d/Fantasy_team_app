<?php

// Require the autoloader to autoload classes
require_once __DIR__ . '/../vendor/autoload.php';

use FantasyTeamApp\Core\Router;

// Create a new router instance
$router = new FantasyTeamApp\Core\Router();

// Define routes
$router->addRoute('GET', '^/$', function () {
    // Handle the home page
    echo 'Welcome to the home page!';
});

$router->addRoute('GET', 'teams', function () {
    // Handle the teams page
    echo 'View all teams';
});

$router->addRoute('GET', '/teams/(\d+)', function ($teamId) {
    // Handle viewing a specific team using $teamId
    echo 'View team with ID: ' . $teamId;
});

$router->addRoute('POST', '/createTeam', function () {
    // Handle the creation of a team
    // instantiate the TeamController and call the createTeam method here
    $teamController = new FantasyTeamApp\Controllers\TeamController(new FantasyTeamApp\Views\TeamView());
    $gameType = $_POST['gameType']; // Assuming gameType is submitted in the form
    $players = $_POST['players']; // Assuming players are submitted in the form
    $teamController->createTeam($gameType, $players);
});

// Add more routes as needed

// Route the current request
$router->route();
