<?php
// Student.php

namespace Schooluitje\Classes;

class Student extends Person
{
    private Group $group;

    public function __construct(string $name, Group $group)
    {
        parent::__construct($name);
        $this->group = $group;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }

    public function role(string $role)
    {
        $this->role = $role;
    }
}