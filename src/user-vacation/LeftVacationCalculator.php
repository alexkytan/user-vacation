<?php

namespace UserVacation;


use UserVacation\Entity\VacationRequest;

trait LeftVacationCalculator
{
    /**
     * @return int
     */
    public function getDaysAmount(): int
    {
        $left_days = self::VACATION_DAYS_AMOUNT;

        foreach ($this->vacation_requests as $request) {
            $date_diff = $this->getVacationDuration($request);

            $left_days -= $date_diff->d;
        }

        return $left_days;
    }

    /**
     * @param VacationRequest $request
     *
     * @return \DateInterval
     */
    public function getVacationDuration(VacationRequest $request): \DateInterval
    {
        return date_diff($request->getStartDay(), $request->getEndDay());
    }
}