<?php

namespace Hospital\Classes;

abstract class Staff extends Person
{
    protected float $salary;

    abstract public function setSalary(float $amount);
    abstract public function getSalary(): float;
}