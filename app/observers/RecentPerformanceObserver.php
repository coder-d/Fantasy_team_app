<?php

namespace FantasyTeamApp\Observers;

class RecentPerformanceObserver implements ObserverInterface
{
    private $players = [];

    public function __construct(array $players = [])
    {
        $this->players = $players;
    }

    public function update()
    {
        // Sort the players array in descending order based on performance scores
        usort($this->players, function ($a, $b) {
            return $b['performanceScore'] - $a['performanceScore'];
        });

        // Now $this->players contains the players sorted by performance score
    }
    
    // Method to retrieve the sorted player list
    public function getSortedPlayers(): array
    {
        return $this->players;
    }
}