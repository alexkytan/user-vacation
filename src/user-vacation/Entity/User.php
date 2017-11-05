<?php

namespace UserVacation\Entity;


class User
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $second_name;

    public function __construct(
        int $id,
        string $email,
        string $first_name,
        string $second_name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->second_name = $second_name;
    }
}