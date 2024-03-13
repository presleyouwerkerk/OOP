<?php

// Author: Presley Ouwerkerk

namespace Hospital\classes;

abstract class Person
{
    private string $name;
    protected string $role;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function setRole(string $role);

    public function getRole(): string
    {
        return $this->role;
    }
}