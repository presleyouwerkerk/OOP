<?php
// Teacher.php

namespace Schooluitje\classes;

class Teacher extends Person
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function role(string $role)
    {
        $this->role = $role;
    }
}