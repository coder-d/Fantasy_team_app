<?php

namespace FantasyTeamApp\Game;

use FantasyTeamApp\Observers\ObserverInterface;
use FantasyTeamApp\Observers\SubjectInterface;

class CricketGame implements GameInterface, SubjectInterface
{
    private $players = [];
    private $observers = [];

    public function __construct(array $initialPlayers)
    {
        $this->players = $initialPlayers;
    }

    public function createTeam(array $selectedPlayers): array
    {
        usort($this->players, function ($a, $b) {

            return $b['performanceScore'] - $a['performanceScore'];
        });
      
        // Implement the logic for creating a cricket team
        // You can use the $selectedPlayers array to select players for the team
        $cricketTeam = [
            'game' => 'Cricket',
            'team' => [],
        ];
        
        // Find common players between $this->players and $selectedPlayers
        $commonPlayers = array_filter($this->players, function ($player) use ($selectedPlayers) {
            return in_array($player['id'], array_column($selectedPlayers, 'id'));
        });

        // Create the team with common players
        $cricketTeam = [
            'game' => 'Cricket',
            'team' => $commonPlayers,
        ];
        return $cricketTeam;
    }

    public function attach(ObserverInterface $observer)
    {
        // Attach an observer to the game
        $this->observers[] = $observer;
    }

    public function detach(ObserverInterface $observer)
    {
        // Detach an observer from the game
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers()
    {
        // Notify all attached observers
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    // Define other cricket-specific methods here
}