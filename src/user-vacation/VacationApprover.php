<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 26.10.2017
 * Time: 23:14
 */

namespace UserVacation;


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
     * @return bool
     */
    public function approveVacation(): bool
    {
        // TO DO
    }

    /**
     * @return bool
     */
    public function rejectVacation(): bool
    {
        // TO DO
    }
}