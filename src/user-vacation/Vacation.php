<?php

namespace UserVacation;

use UserVacation\{
    DB, Entity
};

class Vacation implements VacationCalculatorInterface, VacationValidatorInterface
{
    use LeftVacationCalculator;

    /**
     * @var int
     */
    private $user_id;

    /**
     * @var array of Entity\VacationRequest
     */
    private $vacation_requests;

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
        $this->vacation_requests = DB\RequestStatusRepository::create()->where('user_id', $user_id);
    }

    public function validateVacation(): bool
    {
        // TODO: Implement validateVacation() method.
    }
}