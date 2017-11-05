<?php

namespace UserVacation\DB;


use UserVacation\Entity\VacationRequestStatus;

final class RequestStatusRepository
{
    const CONFIG_TABLE_NAME = 'request_status';

    /**
     * @param $data
     * @return VacationRequestStatus
     */
    public static function formatRow($data): VacationRequestStatus
    {
        return new VacationRequestStatus(
            $data['id'],
            $data['slug'],
            $data['name']
        );
    }
}