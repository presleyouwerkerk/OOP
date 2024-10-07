<?php
// school_trip.php

namespace Schooluitje\Classes;

class SchoolTrip
{
    private array $schoolTripLists = [];

    public function addSchoolTripList(SchoolTripList $schoolTripList) 
    {
        $this->schoolTripLists[] = $schoolTripList;
    }

    public function getSchoolTripLists(): array
    {
        return $this->schoolTripLists;
    }
}
