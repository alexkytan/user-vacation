<?php

namespace UserVacation;


use UserVacation\Entity\VacationRequest;

interface VacationValidatorInterface
{
    public function validateVacation(VacationRequest $request): bool;
}