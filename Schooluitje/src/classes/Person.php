<?php 
// Person.php

namespace Schooluitje\classes;

abstract class Person 
{
    public string $name;
    public string $role;

    public function __construct(string $name)
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

    abstract public function role(string $role);
}