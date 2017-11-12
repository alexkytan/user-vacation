<?php

namespace UserVacation;


use UserVacation\DB\{
    RequestStatusRepository,
    VacationRequestRepository
};
use UserVacation\Entity\VacationRequest;

class VacationApprover
{
    /**
     * @var Vacation
     */
    private $vacation;

    public function __construct(Vacation $vacation)
    {
        $this->vacation = $vacation;
    }

    /**
     * @param VacationRequest $request
     * @return bool
     */
    public static function approveVacation(VacationRequest $request): bool
    {
        $request->setStatusId(RequestStatusRepository::VACATION_REQUEST_APPROVED);

        return VacationRequestRepository::create()->save($request);
    }

    /**
     * @return bool
     */
    public function rejectVacation(VacationRequest $request): bool
    {
        $request->setStatusId(RequestStatusRepository::VACATION_REQUEST_REJECTED);

        return VacationRequestRepository::create()->save($request);
    }
}