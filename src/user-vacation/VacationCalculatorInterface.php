<?php

namespace UserVacation;

use UserVacation\Entity;


interface VacationCalculatorInterface
{
    public function getDaysAmount(): int;
}