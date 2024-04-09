<?php
// school_trip_list.php

namespace Schooluitje\Classes;

class SchoolTripList
{
    private array $studentList = [];
    private Teacher $teacher;

    public function addStudentToList(Student $student, string $paid)
    {
        $this->studentList[] = ['student' => $student, 'paid' => $paid];
    }

    public function setTeacher(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function getStudentList(): array
    {
        return $this->studentList;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }
}