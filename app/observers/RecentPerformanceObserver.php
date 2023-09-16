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
        // Implement observer logic here
        // This method will be called when the observed subject changes
    }
}