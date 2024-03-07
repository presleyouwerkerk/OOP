<?php

// Author: Presley Ouwerkerk

namespace Ziekenhuis;

abstract class Person 
{
    private string $name;
    private string $eyeColor;
    private string $hairColor;
    private float $height;
    private float $weight;
    protected string $role;

    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight) 
    {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function geteyeColor(): string
    {
        return $this->eyeColor;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function getHeight(): float 
    {
        return $this->height;
    }

    public function getWeight(): float 
    {
        return $this->weight;
    }

    abstract public function setRole(string $role);

    public function getRole(): string 
    {
        return $this->role;
    }
}

class Patient extends Person 
{
    private float $payment;

    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight,) 
    {
        parent::__construct($name, $eyeColor, $hairColor, $height, 
        $weight);
    }

    public function setRole(string $role) 
    {
        $this->role = $role;
    }
}

abstract class Staff extends Person 
{
    protected float $salary;
    abstract public function setSalary(float $amount);
    abstract public function getSalary(): float;
}

class Doctor extends Staff 
{
    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight) 
    {
        parent::__construct($name, $eyeColor, $hairColor, 
        $height, $weight);
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

class Nurse extends Staff 
{
    public function __construct(string $name, string $eyeColor, 
    string $hairColor, float $height, float $weight) 
    {
        parent::__construct($name, $eyeColor, 
        $hairColor, $height, $weight);
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

class Appointment 
{
    private Patient $patient;
    private Doctor $doctor;
    private array $nurses;
    private \DateTime $beginTime;
    private \DateTime $endTime;
    private static int $count = 0;
    private static array $appointments = [];

    public function setAppointment(Patient $patient, Doctor $doctor, 
    array $nurses = [], \DateTime $beginTime, \DateTime $endTime) 
    {
        $this->doctor = $doctor;
        $this->nurses = $nurses;
        $this->patient = $patient;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        self::$appointments[] = $this;
        self::$count++;
    }

    public function addNurse(Nurse $nurse) 
    {
        $this->nurses[] = $nurse;
    }    

    public function getDoctor(): Doctor 
    {
        return $this->doctor;
    }

    public function getNurses(): array 
    {
        return $this->nurses;
    }

    public function getPatient(): Patient 
    {
        return $this->patient;
    }

    public function getBeginTime(): string 
    {
        return $this->beginTime->format('Y-m-d H:i');
    }

    public function getEndTime(): string 
    {
        return $this->endTime->format('Y-m-d H:i');
    }

    public static function getCount(): int 
    {
        return self::$count;
    }

    public function getTimeDifference(): float 
    {
        $beginTimestamp = $this->beginTime->getTimestamp();
        $endTimestamp = $this->endTime->getTimestamp();
    
        $differenceInSeconds = $endTimestamp - $beginTimestamp;
    
        $hours = $differenceInSeconds / 3600;

        return $hours;
    }

    public function calculateTotalSalaries(): array 
    {
        $duration = $this->getTimeDifference();
    
        $doctorSalary = $this->doctor->getSalary() * $duration;
    
        $nurseSalaries = [];
        
        foreach ($this->nurses as $nurse) 
        {
            $nurseSalaries[] = $nurse->getSalary() * $duration;
        }
    
        return [$doctorSalary, $nurseSalaries];
    }

    public function getCosts(): float 
    {
        $duration = $this->getTimeDifference();

        $doctorCost = $this->doctor->getSalary() * $duration;
    
        $nurseTotalSalary = array_sum($this->calculateTotalSalaries()[1]);
    
        return $doctorCost + $nurseTotalSalary;
    }
}

$patient = new Patient("John", "Brown", "Black", 180, 80);
$patient->setRole("Patient");

$doctor = new Doctor("Dr. Smith", "Blue", "Blonde", 170, 70);
$doctor->setSalary(100);
$doctor->setRole("Doctor");

$nurse1 = new Nurse("Anne", "Green", "Brown", 165, 55);
$nurse1->setSalary(50);
$nurse1->setRole("Nurse");

$nurse2 = new Nurse("Emily", "Brown", "Blonde", 160, 50);
$nurse2->setSalary(50);
$nurse2->setRole("Nurse");

$beginTime = new \DateTime('2024-03-07 09:15');
$endTime = new \DateTime('2024-03-07 10:05');

$appointment = new Appointment();
$appointment->setAppointment($patient, $doctor, [$nurse1, $nurse2], $beginTime, $endTime);

echo "<style>";
echo "table { border-collapse: collapse; width: 100%; margin-bottom: 50px; margin-left: auto; margin-right: auto; }";
echo "th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-family: Arial, sans-serif; }";
echo "th { background-color: #4CAF50; color: white; }";
echo "td ul { margin: 0; padding: 0; }";
echo "td ul li { list-style-type: none; }";
echo "tr:nth-child(even) { background-color: #f9f9f9; }";
echo "</style>";

echo "</table>";
echo "</div>";

echo "<div style='margin: 0 auto; width: fit-content;'>";
echo "<table>";
echo "<tr><th colspan='2'>Appointment " . Appointment::getCount() . "</th></tr>";

echo "<tr><td>" . $patient->getRole() . "</td><td><ul>";
echo "<li>Name: " . $patient->getName() . "</li>";
echo "<li>Eye Color: " . $patient->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $patient->getHairColor() . "</li>";
echo "<li>Height: " . $patient->getHeight() . " cm</li>";
echo "<li>Weight: " . $patient->getWeight() . " kg</li>";
echo "<li>Payment: $" . number_format($appointment->getCosts(), 2) . "</li>";
echo "</ul></td></tr>";

echo "<tr><td>" . $doctor->getRole() . "</td><td><ul>";
echo "<li>Name: " . $doctor->getName() . "</li>";
echo "<li>Eye Color: " . $doctor->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $doctor->getHairColor() . "</li>";
echo "<li>Height: " . $doctor->getHeight() . " cm</li>";
echo "<li>Weight: " . $doctor->getWeight() . " kg</li>";
echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[0], 2) . "</li>";
echo "</ul></td></tr>";

foreach ($appointment->getNurses() as $index => $nurse) {
    echo "<tr><td>" . $nurse->getRole() . "</td><td><ul>";
    echo "<li>Name: " . $nurse->getName() . "</li>";
    echo "<li>Eye Color: " . $nurse->getEyeColor() . "</li>";
    echo "<li>Hair Color: " . $nurse->getHairColor() . "</li>";
    echo "<li>Height: " . $nurse->getHeight() . " cm</li>";
    echo "<li>Weight: " . $nurse->getWeight() . " kg</li>";
    echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[1][$index], 2) . "</li>";
    echo "</ul></td></tr>";
}

echo "<tr><td>Begin Time:</td><td>" . $appointment->getBeginTime() . "</td></tr>";
echo "<tr><td>End Time:</td><td>" . $appointment->getEndTime() . "</td></tr>";

echo "</table>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$patient = new Patient("Alice", "Blue", "Blonde", 165, 55);
$patient->setRole("Patient");

$doctor = new Doctor("Dr. James", "Green", "Brown", 180, 75);
$doctor->setSalary(150);
$doctor->setRole("Doctor");

$nurse1 = new Nurse("Sophia", "Brown", "Black", 170, 60);
$nurse1->setSalary(100);
$nurse1->setRole("Nurse");

// $nurse2 = new Nurse("Emily", "Brown", "Blonde", 160, 50);
// $nurse2->setSalary(50);
// $nurse2->setRole("Nurse");

$beginTime = new \DateTime('2024-03-08 10:30');
$endTime = new \DateTime('2024-03-08 11:05');

$appointment = new Appointment();
$appointment->setAppointment($patient, $doctor, [$nurse1], $beginTime, $endTime);

echo "<div style='margin: 0 auto; width: fit-content;'>";
echo "<table>";
echo "<tr><th colspan='2'>Appointment " . Appointment::getCount() . "</th></tr>";

echo "<tr><td>" . $patient->getRole() . "</td><td><ul>";
echo "<li>Name: " . $patient->getName() . "</li>";
echo "<li>Eye Color: " . $patient->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $patient->getHairColor() . "</li>";
echo "<li>Height: " . $patient->getHeight() . " cm</li>";
echo "<li>Weight: " . $patient->getWeight() . " kg</li>";
echo "<li>Payment: $" . number_format($appointment->getCosts(), 2) . "</li>";
echo "</ul></td></tr>";

echo "<tr><td>" . $doctor->getRole() . "</td><td><ul>";
echo "<li>Name: " . $doctor->getName() . "</li>";
echo "<li>Eye Color: " . $doctor->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $doctor->getHairColor() . "</li>";
echo "<li>Height: " . $doctor->getHeight() . " cm</li>";
echo "<li>Weight: " . $doctor->getWeight() . " kg</li>";
echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[0], 2) . "</li>";
echo "</ul></td></tr>";

foreach ($appointment->getNurses() as $index => $nurse) {
    echo "<tr><td>" . $nurse->getRole() . "</td><td><ul>";
    echo "<li>Name: " . $nurse->getName() . "</li>";
    echo "<li>Eye Color: " . $nurse->getEyeColor() . "</li>";
    echo "<li>Hair Color: " . $nurse->getHairColor() . "</li>";
    echo "<li>Height: " . $nurse->getHeight() . " cm</li>";
    echo "<li>Weight: " . $nurse->getWeight() . " kg</li>";
    echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[1][$index], 2) . "</li>";
    echo "</ul></td></tr>";
}

echo "<tr><td>Begin Time:</td><td>" . $appointment->getBeginTime() . "</td></tr>";
echo "<tr><td>End Time:</td><td>" . $appointment->getEndTime() . "</td></tr>";

echo "</table>";
echo "</div>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$patient = new Patient("Sarah", "Brown", "Black", 170, 65);
$patient->setRole("Patient");

$doctor = new Doctor("Dr. Jim", "Brown", "Black", 175, 80);
$doctor->setSalary(125);
$doctor->setRole("Doctor");

// $nurse1 = new Nurse("Emma", "Blue", "Blonde", 160, 50);
// $nurse1->setSalary(60);
// $nurse1->setRole("Nurse");

// $nurse2 = new Nurse("Olivia", "Green", "Brown", 165, 55);
// $nurse2->setSalary(60);
// $nurse2->setRole("Nurse");

$beginTime = new \DateTime('2024-03-09 14:45');
$endTime = new \DateTime('2024-03-09 15:15');

$appointment = new Appointment();
$appointment->setAppointment($patient, $doctor, [], $beginTime, $endTime);

echo "<div style='margin: 0 auto; width: fit-content;'>";
echo "<table>";
echo "<tr><th colspan='2'>Appointment " . Appointment::getCount() . "</th></tr>";

echo "<tr><td>" . $patient->getRole() . "</td><td><ul>";
echo "<li>Name: " . $patient->getName() . "</li>";
echo "<li>Eye Color: " . $patient->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $patient->getHairColor() . "</li>";
echo "<li>Height: " . $patient->getHeight() . " cm</li>";
echo "<li>Weight: " . $patient->getWeight() . " kg</li>";
echo "<li>Payment: $" . number_format($appointment->getCosts(), 2) . "</li>";
echo "</ul></td></tr>";

echo "<tr><td>" . $doctor->getRole() . "</td><td><ul>";
echo "<li>Name: " . $doctor->getName() . "</li>";
echo "<li>Eye Color: " . $doctor->getEyeColor() . "</li>";
echo "<li>Hair Color: " . $doctor->getHairColor() . "</li>";
echo "<li>Height: " . $doctor->getHeight() . " cm</li>";
echo "<li>Weight: " . $doctor->getWeight() . " kg</li>";
echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[0], 2) . "</li>";
echo "</ul></td></tr>";

foreach ($appointment->getNurses() as $index => $nurse) {
    echo "<tr><td>" . $nurse->getRole() . "</td><td><ul>";
    echo "<li>Name: " . $nurse->getName() . "</li>";
    echo "<li>Eye Color: " . $nurse->getEyeColor() . "</li>";
    echo "<li>Hair Color: " . $nurse->getHairColor() . "</li>";
    echo "<li>Height: " . $nurse->getHeight() . " cm</li>";
    echo "<li>Weight: " . $nurse->getWeight() . " kg</li>";
    echo "<li>Salary: $" . number_format($appointment->calculateTotalSalaries()[1][$index], 2) . "</li>";
    echo "</ul></td></tr>";
}

echo "<tr><td>Begin Time:</td><td>" . $appointment->getBeginTime() . "</td></tr>";
echo "<tr><td>End Time:</td><td>" . $appointment->getEndTime() . "</td></tr>";

echo "</table>";
echo "</div>";