<?php
// SchoolTrip.php

namespace Schooluitje\classes;

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
