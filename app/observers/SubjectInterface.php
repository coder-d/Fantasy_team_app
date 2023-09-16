<?php

namespace FantasyTeamApp\Observers;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer);

    public function detach(ObserverInterface $observer);

    public function notifyObservers();
}