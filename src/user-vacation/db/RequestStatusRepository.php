<?php

namespace UserVacation\DB;


use UserVacation\Entity\VacationRequestStatus;

final class RequestStatusRepository
{
    const CONFIG_TABLE_NAME = 'request_status';

    /**
     * @param array $data
     *
     * @return VacationRequestStatus
     */
    public static function formatRow(array $row): VacationRequestStatus
    {
        return new VacationRequestStatus(
            $row['id'],
            $row['slug'],
            $row['name']
        );
    }
}