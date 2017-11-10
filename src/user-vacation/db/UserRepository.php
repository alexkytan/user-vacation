<?php

namespace UserVacation\DB;


use UserVacation\Entity\User;

class UserRepository extends Repository
{

    /**
     * @param array $row
     *
     * @return mixed
     */
    public static function formatRow(array $row)
    {
        return new User(
            $row['id'],
            $row['email'],
            $row['first_name'],
            $row['second_name']
        );
    }
}