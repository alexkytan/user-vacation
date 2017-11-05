<?php

namespace UserVacation\DB;


use UserVacation\Entity\VacationRequest;

final class VacationRequestRepository extends Repository
{
    const CONFIG_TABLE_NAME = 'vacation_request';

    /**
     * @param array $row
     * @return mixed
     */
    public static function formatRow(array $row): VacationRequest
    {
        // TODO: Implement formatRow() method.
    }
}