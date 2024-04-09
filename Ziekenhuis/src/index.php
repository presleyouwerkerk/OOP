<?php

require __DIR__ . '/../vendor/autoload.php';

use Hospital\Classes\Patient;
use Hospital\Classes\Doctor;
use Hospital\Classes\Nurse;
use Hospital\Classes\Appointment;

// Appointment 1

$patient1 = new Patient("John", "Brown", "Black", 180, 80);
$patient1->setRole("Patient");

$doctor1 = new Doctor("Dr. Smith", "Blue", "Blonde", 170, 70);
$doctor1->setSalary(100);
$doctor1->setRole("Doctor");

$nurse1 = new Nurse("Anne", "Green", "Brown", 165, 55);
$nurse1->setSalary(50);
$nurse1->setRole("Nurse");

$nurse2 = new Nurse("Emily", "Brown", "Blonde", 160, 50);
$nurse2->setSalary(50);
$nurse2->setRole("Nurse");

$beginTime1 = new \DateTime('2024-03-15 09:15');
$endTime1 = new \DateTime('2024-03-15 10:05');

$appointment1 = new Appointment();
$appointment1->setAppointment($patient1, $doctor1, [], $beginTime1, $endTime1);
$appointment1->addNurse([$nurse1, $nurse2]);


// Appointment 2

$patient2 = new Patient("Alice", "Blue", "Blonde", 165, 55);
$patient2->setRole("Patient");

$doctor2 = new Doctor("Dr. James", "Green", "Brown", 180, 75);
$doctor2->setSalary(150);
$doctor2->setRole("Doctor");

$nurse3 = new Nurse("Emma", "Brown", "Black", 170, 60);
$nurse3->setSalary(100);
$nurse3->setRole("Nurse");

$beginTime2 = new \DateTime('2024-05-08 10:30');
$endTime2 = new \DateTime('2024-05-08 11:05');

$appointment2 = new Appointment();
$appointment2->setAppointment($patient2, $doctor2, [], $beginTime2, $endTime2);
$appointment2->addNurse([$nurse3]);


// Appointment 3

$patient3 = new Patient("Sarah", "Brown", "Black", 170, 65);
$patient3->setRole("Patient");

$doctor3 = new Doctor("Dr. Jim", "Brown", "Black", 175, 80);
$doctor3->setSalary(125);
$doctor3->setRole("Doctor");

$beginTime3 = new \DateTime('2024-08-23 14:45');
$endTime3 = new \DateTime('2024-08-23 15:15');

$appointment3 = new Appointment();
$appointment3->setAppointment($patient3, $doctor3, [], $beginTime3, $endTime3);

echo "<style>";
echo "table { border-collapse: collapse; width: 100%; margin-bottom: 50px; margin-left: auto; margin-right: auto; }";
echo "th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-family: Arial, sans-serif; }";
echo "th { background-color: #4CAF50; color: white; }";
echo "td ul { margin: 0; padding: 0; }";
echo "td ul li { list-style-type: none; }";
echo "tr:nth-child(even) { background-color: #f9f9f9; }";
echo "</style>";

echo "<div style='margin: 0 auto; width: fit-content;'>";

foreach (Appointment::getAppointments() as $appointment) 
{
    echo "<table>";
    echo "<tr><th colspan='2'>Appointment " . Appointment::getCount() . "</th></tr>";

    echo "<tr><td>" . $appointment->getPatient()->getRole() . "</td><td><ul>";
    echo "<li>Name: " . $appointment->getPatient()->getName() . "</li>";
    echo "<li>Eye Color: " . $appointment->getPatient()->getEyeColor() . "</li>";
    echo "<li>Hair Color: " . $appointment->getPatient()->getHairColor() . "</li>";
    echo "<li>Height: " . $appointment->getPatient()->getHeight() . " cm</li>";
    echo "<li>Weight: " . $appointment->getPatient()->getWeight() . " kg</li>";
    echo "<li>Payment: €" . number_format($appointment->getCosts(), 2) . "</li>";
    echo "</ul></td></tr>";

    echo "<tr><td>" . $appointment->getDoctor()->getRole() . "</td><td><ul>";
    echo "<li>Name: " . $appointment->getDoctor()->getName() . "</li>";
    echo "<li>Salary: €" . number_format($appointment->calculateTotalSalaries()[0], 2) . "</li>";
    echo "</ul></td></tr>";

    foreach ($appointment->getNurses() as $index => $nurse) 
    {
        echo "<tr><td>" . $nurse->getRole() . "</td><td><ul>";
        echo "<li>Name: " . $nurse->getName() . "</li>";
        echo "<li>Salary: €" . number_format($appointment->calculateTotalSalaries()[1][$index], 2) . "</li>";
        echo "</ul></td></tr>";
    }

    echo "<tr><td>Begin Time:</td><td>" . $appointment->getBeginTime() . "</td></tr>";
    echo "<tr><td>End Time:</td><td>" . $appointment->getEndTime() . "</td></tr>";

    echo "</table>";
}
echo "</div>";