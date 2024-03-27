<?php

require __DIR__ . '/../vendor/autoload.php';

use Schooluitje\classes\Student;
use Schooluitje\classes\Teacher;
use Schooluitje\classes\Group;
use Schooluitje\classes\SchoolTriplist;
use Schooluitje\classes\SchoolTrip;

$schoolTrip = new SchoolTrip();

// Koningstein
$koningsteinList = new SchoolTripList();
$koningsteinTeacher = new Teacher('Koningstein');
$koningsteinList->setTeacher($koningsteinTeacher);
$koningsteinList->addStudentToList(new Student('Piet', new Group('sod2a')), 'Nee');
$koningsteinList->addStudentToList(new Student('Jan', new Group('sod2a')), 'Ja');
$koningsteinList->addStudentToList(new Student('Kees', new Group('sod2b')), 'Ja');

$schoolTrip->addSchoolTripList($koningsteinList);

// Brugge
$bruggeList = new SchoolTripList();
$koningsteinTeacher = new Teacher('Brugge');
$bruggeList->setTeacher($koningsteinTeacher);
$bruggeList->addStudentToList(new Student('Klaas', new Group('sod2b')), 'Ja');
$bruggeList->addStudentToList(new Student('Mohammed', new Group('sod2a')), 'Nee');
$bruggeList->addStudentToList(new Student('Eefje', new Group('sod2b')), 'Ja');

$schoolTrip->addSchoolTripList($bruggeList);

// Drimmelen
$drimmelenList = new SchoolTripList();
$koningsteinTeacher = new Teacher('Drimmelen');
$drimmelenList->setTeacher($koningsteinTeacher);
$drimmelenList->addStudentToList(new Student('Martijn', new Group('sod2b')), 'Nee');
$drimmelenList->addStudentToList(new Student('Pieter', new Group('sod2a')), 'Ja');

$schoolTrip->addSchoolTripList($drimmelenList);

echo "<table border='1'>";
echo "<tr><th>Docent</th><th>Student</th><th>Klas</th><th>Betaald</th></tr>";

foreach ($schoolTrip->getSchoolTripLists() as $schoolTripList) 
{
    $teacher = $schoolTripList->getTeacher();
    $studentList = $schoolTripList->getStudentList();

    $firstRowForTeacher = true;

    foreach ($studentList as $studentInfo) 
    {
        $student = $studentInfo['student'];
        $group = $student->getGroup();
        $paid = $studentInfo['paid'];

        echo "<tr>";
    
        if ($firstRowForTeacher) 
        {
            echo "<td rowspan='" . count($studentList) . "'>" . $teacher->getName() . "</td>";
            $firstRowForTeacher = false;
        } 
        echo "<td>" . $student->getName() . "</td>";
        echo "<td>" . $group->getName() . "</td>";
        echo "<td>" . $paid . "</td>";
        echo "</tr>";
    }
}

echo "</table>";