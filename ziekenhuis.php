<?php

// Author: Presley Ouwerkerk

namespace Ziekenhuis;

abstract class Person {
    private string $name;
    private string $eyeColor;
    private string $hairColor;
    private float $height;
    private float $weight;
    protected string $role;

    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getName(): string {
        return $this->name;
    }

    abstract public function setRole(string $role);
}

class Patient extends Person {
    private float $payment;

    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight, float $payment) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight);
        $this->payment = $payment;
    }

    public function setRole(string $role) {
        $this->role = $role;
    }

    public function getPayment() {
        return $this->payment;
    }
}

abstract class Staff extends Person {
    protected float $salary;
    abstract public function setSalary(float $amount);
    abstract public function getSalary(): float;
}

class Doctor extends Staff {
    public function setSalary(float $amount) {
        $this->salary = $amount;
    }

    public function getSalary(): float {
        return $this->salary; 
    }

    public function setRole(string $role) {
        $this->role = $role;
    }
}

class Nurse extends Staff {
    public function setSalary(float $amount) {
        $this->salary = $amount;
    }

    public function getSalary(): float {
        return $this->salary;
    }

    public function setRole(string $role) {
        $this->role = $role;
    }
}

class Appointment {
    private Patient $patient;
    private Doctor $doctor;
    private array $nurses;
    private \DateTime $beginTime;
    private \DateTime $endTime;
    private static int $count = 0;
    private static array $appointments = [];

    public function setAppointment(Patient $patient, Doctor $doctor, 
    array $nurses, \DateTime $beginTime, \DateTime $endTime) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurses = $nurses;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        self::$count++;
    }

    public function addNurse(Nurse $nurse) {
        $this->nurses[] = $nurse;
    }

    public function getDoctor(): Doctor {
        return $this->doctor;
    }

    public function getPatient(): Patient {
        return $this->patient;
    }
    
    public function getNurses(): array {
        return $this->nurses;
    }

    public function getBeginTime(): string {
        return $this->beginTime->format('Y-m-d H:i:s');
    }

    public function getEndTime(): string {
        return $this->endTime->format('Y-m-d H:i:s');
    }

    public static function getCount(): int {
        return self::$count;
    }

    public static function addAppointment(Appointment $appointment) {
        self::$appointments[] = $appointment;
    }

    public static function getAppointments(): array {
        return self::$appointments;
    }

    public function getTimeDifference(): float {
        $beginTimestamp = $this->beginTime->getTimestamp();
        $endTimestamp = $this->endTime->getTimestamp();
    
        $differenceInSeconds = $endTimestamp - $beginTimestamp;
    
        $hours = $differenceInSeconds / 3600;

        return $hours;
    }

    public function getCosts(): float {
        $duration = $this->getTimeDifference();

        $doctorCost = $duration * $this->doctor->getSalary();

        $totalNurseBonus = 0;

        foreach ($this->nurses as $nurse) {
            $totalNurseBonus += $duration * $nurse->getSalary();
        }

        return $doctorCost + $totalNurseBonus;
    }
}