<?php

namespace Hospital\classes;

class Appointment
{
    private Patient $patient;
    private Doctor $doctor;
    private array $nurses;
    private \DateTime $beginTime;
    private \DateTime $endTime;
    private static int $count = 0;
    private static array $appointments = [];

    public function setAppointment(
        Patient $patient,
        Doctor $doctor,
        array $nurses = [],
        \DateTime $beginTime,
        \DateTime $endTime
    ) {
        $this->doctor = $doctor;
        $this->nurses = $nurses;
        $this->patient = $patient;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        self::$appointments[] = $this;
    }

    public function addNurse(array $nurses)
    {
        foreach ($nurses as $nurse) {
            $this->nurses[] = $nurse;
        }
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
        return ++self::$count;
    }

    public static function getAppointments(): array
    {
        return self::$appointments;
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

        foreach ($this->nurses as $nurse) {
            $nurseSalaries[] = $nurse->getSalary() * $duration;
        }

        return [$doctorSalary, $nurseSalaries];
    }

    public function getCosts(): float
    {
        $doctorCost = $this->calculateTotalSalaries()[0];

        $nurseTotalSalary = array_sum($this->calculateTotalSalaries()[1]);

        return $doctorCost + $nurseTotalSalary;
    }
}