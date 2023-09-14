<?php

namespace FantasyTeamApp\Game;

interface GameInterface
{
    public function createTeam(array $players): array;
    // Define other game-related methods here
}