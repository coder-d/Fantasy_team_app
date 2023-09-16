<?php

namespace FantasyTeamApp\Game;

use FantasyTeamApp\Observers\ObserverInterface;
use FantasyTeamApp\Observers\SubjectInterface;

class CricketGame implements GameInterface, SubjectInterface
{
    private $players = [];
    private $observers = [];

    public function __construct(array $players)
    {
        $this->players = $players;
    }

    public function createTeam(array $selectedPlayers): array
    {
        // Implement the logic for creating a cricket team
        // You can use the $selectedPlayers array to select players for the team
        $cricketTeam = [
            'game' => 'Cricket',
            'team' => [],
        ];

        foreach ($this->players as $player) {
            // Add player selection logic here based on $selectedPlayers
            if (in_array($player['id'], $selectedPlayers)) {
                $cricketTeam['team'][] = $player;
            }
        }

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