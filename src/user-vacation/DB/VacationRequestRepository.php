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
        return new VacationRequest(
            $row['id'],
            $row['user_id'],
            $row['status_id'],
            $row['start_day'],
            $row['end_day']
        );
    }
}