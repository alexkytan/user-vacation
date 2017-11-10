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
        $this->user_id           = $user_id;
        $this->vacation_requests = DB\RequestStatusRepository::create()->find('user_id', $user_id);
    }

    /**
     * @param Entity\VacationRequest $request
     *
     * @return bool
     */
    public function validateVacation(Entity\VacationRequest $request): bool
    {
        $duration = $this->getVacationDuration($request);

        if ($this->getDaysAmount() >= $duration->d) {
            return true;
        }

        return false;
    }
}