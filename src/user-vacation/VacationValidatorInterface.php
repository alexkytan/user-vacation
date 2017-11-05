<?php

namespace UserVacation;


interface VacationValidatorInterface
{
    public function validateVacation(): bool;
}