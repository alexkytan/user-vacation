<?php

namespace UserVacation;

use UserVacation\Entity;


interface VacationCalculatorInterface
{
    const VACATION_DAYS_AMOUNT = 20;

    public function getDaysAmount(): int;
}