<?php

// Deze week heb ik veel tijd moeten besteden aan het afmaken van mijn 
// opdrachten voor Laravel en PHPUnit-tests. Hierdoor heb ik moeite gehad om de 
// opdracht voor het schooluitje op tijd af te krijgen.

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