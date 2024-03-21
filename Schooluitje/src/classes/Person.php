<?php

// NOTE: Deze week heb ik veel tijd moeten besteden aan het afmaken van mijn 
// opdrachten voor Laravel en PHPUnit-tests. Hierdoor heb ik moeite gehad om de 
// opdracht voor het Schooluitje op tijd af te krijgen. Ik heb nog extra
// tijd nodig om het helemaal af te maken.

namespace Person;

abstract class Person 
{
    public string $person;
    public string $role;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function role();
}