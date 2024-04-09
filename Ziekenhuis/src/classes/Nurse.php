<?php

namespace Hospital\Classes;

class Nurse extends Staff
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function setSalary(float $amount)
    {
        $this->salary = $amount;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }
}